<?php
require_once 'Database.php';

class User {
    private $db;
    private $table = 'users';

    public function __construct() {
        $this->db = new Database();
    }

    public function register($first_name, $last_name, $email, $password) {
        // Vérifier si l'email existe déjà
        if ($this->emailExists($email)) {
            return ['success' => false, 'message' => 'Cet email est déjà utilisé.'];
        }

        // Valider les données
        $validation = $this->validateRegistrationData($first_name, $last_name, $email, $password);
        if (!$validation['valid']) {
            return ['success' => false, 'message' => $validation['message']];
        }

        // Hasher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        // Générer un token de vérification
        $verification_token = bin2hex(random_bytes(32));

        // Insérer l'utilisateur
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (first_name, last_name, email, password, verification_token) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $verification_token);

        if ($stmt->execute()) {
            $user_id = $this->db->lastInsertId();
            
            // Envoyer l'email de vérification (à implémenter)
            $this->sendVerificationEmail($email, $verification_token);
            
            return [
                'success' => true, 
                'message' => 'Inscription réussie. Vérifiez votre email pour activer votre compte.',
                'user_id' => $user_id
            ];
        }

        return ['success' => false, 'message' => 'Erreur lors de l\'inscription.'];
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT id, first_name, last_name, email, password, role, email_verified, is_active FROM {$this->table} WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Email ou mot de passe incorrect.'];
        }

        $user = $result->fetch_assoc();

        // Vérifier si le compte est actif
        if (!$user['is_active']) {
            return ['success' => false, 'message' => 'Votre compte a été désactivé.'];
        }

        // Vérifier le mot de passe
        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => 'Email ou mot de passe incorrect.'];
        }

        // Vérifier si l'email est vérifié
        if (!$user['email_verified']) {
            return ['success' => false, 'message' => 'Veuillez vérifier votre email avant de vous connecter.'];
        }

        // Mettre à jour la dernière connexion
        $this->updateLastLogin($user['id']);

        // Démarrer la session
        $this->startSession($user);

        return [
            'success' => true, 
            'message' => 'Connexion réussie.',
            'user' => [
                'id' => $user['id'],
                'name' => $user['first_name'] . ' ' . $user['last_name'],
                'email' => $user['email'],
                'role' => $user['role']
            ]
        ];
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        return ['success' => true, 'message' => 'Déconnexion réussie.'];
    }

    public function verifyEmail($token) {
        $stmt = $this->db->prepare("SELECT id FROM {$this->table} WHERE verification_token = ? AND email_verified = FALSE");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Token de vérification invalide ou déjà utilisé.'];
        }

        $user = $result->fetch_assoc();
        
        // Marquer l'email comme vérifié
        $stmt = $this->db->prepare("UPDATE {$this->table} SET email_verified = TRUE, verification_token = NULL WHERE id = ?");
        $stmt->bind_param("i", $user['id']);
        
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Email vérifié avec succès. Vous pouvez maintenant vous connecter.'];
        }

        return ['success' => false, 'message' => 'Erreur lors de la vérification de l\'email.'];
    }

    public function requestPasswordReset($email) {
        $stmt = $this->db->prepare("SELECT id FROM {$this->table} WHERE email = ? AND is_active = TRUE");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Aucun compte trouvé avec cet email.'];
        }

        $user = $result->fetch_assoc();
        
        // Générer un token de réinitialisation
        $reset_token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $stmt = $this->db->prepare("UPDATE {$this->table} SET reset_token = ?, reset_token_expires = ? WHERE id = ?");
        $stmt->bind_param("ssi", $reset_token, $expires, $user['id']);

        if ($stmt->execute()) {
            // Envoyer l'email de réinitialisation (à implémenter)
            $this->sendPasswordResetEmail($email, $reset_token);
            
            return ['success' => true, 'message' => 'Un email de réinitialisation a été envoyé.'];
        }

        return ['success' => false, 'message' => 'Erreur lors de la demande de réinitialisation.'];
    }

    public function resetPassword($token, $new_password) {
        // Vérifier le token et sa validité
        $stmt = $this->db->prepare("SELECT id FROM {$this->table} WHERE reset_token = ? AND reset_token_expires > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Token de réinitialisation invalide ou expiré.'];
        }

        $user = $result->fetch_assoc();
        
        // Valider le nouveau mot de passe
        if (strlen($new_password) < 6) {
            return ['success' => false, 'message' => 'Le mot de passe doit contenir au moins 6 caractères.'];
        }

        // Hasher le nouveau mot de passe
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Mettre à jour le mot de passe et supprimer le token
        $stmt = $this->db->prepare("UPDATE {$this->table} SET password = ?, reset_token = NULL, reset_token_expires = NULL WHERE id = ?");
        $stmt->bind_param("si", $hashed_password, $user['id']);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Mot de passe réinitialisé avec succès.'];
        }

        return ['success' => false, 'message' => 'Erreur lors de la réinitialisation du mot de passe.'];
    }

    public function toggleUserStatus($userId) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET is_active = NOT is_active WHERE id = ?");
        $stmt->bind_param("i", $userId);
        return $stmt->execute();
    }
    
    public function deleteUser($userId) {
        // Vérifier que l'utilisateur n'est pas le seul admin
        $stmt = $this->db->prepare("SELECT COUNT(*) as admin_count FROM {$this->table} WHERE role = 'admin' AND is_active = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $adminCount = $result->fetch_assoc()['admin_count'];
        
        // Vérifier si l'utilisateur à supprimer est admin
        $stmt = $this->db->prepare("SELECT role FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if ($user['role'] === 'admin' && $adminCount <= 1) {
            return ['success' => false, 'message' => 'Impossible de supprimer le dernier administrateur.'];
        }
        
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $userId);
        return $stmt->execute();
    }
    
    public function updateUserRole($userId, $role) {
        // Vérifier que le rôle est valide
        if (!in_array($role, ['user', 'admin'])) {
            return false;
        }
        
        // Si on retire le rôle admin, vérifier qu'il reste au moins un admin
        if ($role === 'user') {
            $stmt = $this->db->prepare("SELECT COUNT(*) as admin_count FROM {$this->table} WHERE role = 'admin' AND is_active = 1 AND id != ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $adminCount = $result->fetch_assoc()['admin_count'];
            
            if ($adminCount < 1) {
                return false; // Il faut au moins un admin
            }
        }
        
        $stmt = $this->db->prepare("UPDATE {$this->table} SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $role, $userId);
        return $stmt->execute();
    }
    
    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return null;
    }
    
    public function updateUserInfo($userId, $first_name, $last_name, $email) {
        // Vérifier si l'email existe déjà pour un autre utilisateur
        $stmt = $this->db->prepare("SELECT id FROM {$this->table} WHERE email = ? AND id != ?");
        $stmt->bind_param("si", $email, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return ['success' => false, 'message' => 'Cet email est déjà utilisé par un autre utilisateur.'];
        }
        
        $stmt = $this->db->prepare("UPDATE {$this->table} SET first_name = ?, last_name = ?, email = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
        $stmt->bind_param("sssi", $first_name, $last_name, $email, $userId);
        
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Informations mises à jour avec succès.'];
        }
        
        return ['success' => false, 'message' => 'Erreur lors de la mise à jour.'];
    }
    
    public function getUserStats() {
        $stats = [];
        
        // Total utilisateurs
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM {$this->table}");
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['total'] = $result->fetch_assoc()['total'];
        
        // Utilisateurs actifs
        $stmt = $this->db->prepare("SELECT COUNT(*) as active FROM {$this->table} WHERE is_active = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['active'] = $result->fetch_assoc()['active'];
        
        // Administrateurs
        $stmt = $this->db->prepare("SELECT COUNT(*) as admins FROM {$this->table} WHERE role = 'admin'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['admins'] = $result->fetch_assoc()['admins'];
        
        // Nouveaux utilisateurs (derniers 30 jours)
        $stmt = $this->db->prepare("SELECT COUNT(*) as recent FROM {$this->table} WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)");
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['recent'] = $result->fetch_assoc()['recent'];
        
        return $stats;
    }

    private function emailExists($email) {
        $stmt = $this->db->prepare("SELECT id FROM {$this->table} WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    private function validateRegistrationData($first_name, $last_name, $email, $password) {
        if (empty($first_name) || empty($last_name)) {
            return ['valid' => false, 'message' => 'Le prénom et le nom sont requis.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['valid' => false, 'message' => 'Email invalide.'];
        }

        if (strlen($password) < 6) {
            return ['valid' => false, 'message' => 'Le mot de passe doit contenir au moins 6 caractères.'];
        }

        return ['valid' => true];
    }

    private function startSession($user) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['first_name'] . ' ' . $user['last_name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_admin'] = ($user['role'] === 'admin');
        $_SESSION['logged_in'] = true;
    }

    private function updateLastLogin($user_id) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET last_login = NOW() WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    }

    private function sendVerificationEmail($email, $token) {
        // À implémenter - envoyer l'email de vérification
        // Utiliser PHPMailer ou une autre bibliothèque d'email
        $verification_link = "http://localhost/Groupe-4/auth/verify-email.php?token=" . $token;
        
        // Log pour debug (à supprimer en production)
        error_log("Email de vérification pour $email : $verification_link");
    }

    private function sendPasswordResetEmail($email, $token) {
        // À implémenter - envoyer l'email de réinitialisation
        $reset_link = "http://localhost/Groupe-4/auth/reset-password.php?token=" . $token;
        
        // Log pour debug (à supprimer en production)
        error_log("Email de réinitialisation pour $email : $reset_link");
    }


    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT id, first_name, last_name, email, role, is_active, email_verified, created_at, last_login FROM {$this->table} ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isLoggedIn() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public function requireLogin() {
        if (!$this->isLoggedIn()) {
            header('Location: /Groupe-4/auth/login.php');
            exit();
        }
    }

    public function requireAdmin() {
        $this->requireLogin();
        
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
            header('Location: /Groupe-4/index.php?error=access_denied');
            exit();
        }
    }
}
