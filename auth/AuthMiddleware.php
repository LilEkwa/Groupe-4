<?php
require_once __DIR__ . '/User.php';

class AuthMiddleware {
    private $user;
    
    public function __construct() {
        $this->user = new User();
    }
    
    /**
     * Vérifie si l'utilisateur est connecté
     */
    public function requireLogin($redirectUrl = '/Groupe-4/auth/login.php') {
        if (!$this->user->isLoggedIn()) {
            $currentUrl = $_SERVER['REQUEST_URI'];
            header("Location: $redirectUrl?redirect=" . urlencode($currentUrl));
            exit();
        }
    }
    
    /**
     * Vérifie si l'utilisateur est admin
     */
    public function requireAdmin($redirectUrl = '/Groupe-4/index.php') {
        $this->requireLogin();
        
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
            header("Location: $redirectUrl?message=" . urlencode('Accès non autorisé.') . '&type=error');
            exit();
        }
    }
    
    /**
     * Récupère les informations de l'utilisateur connecté
     */
    public function getCurrentUser() {
        if (!$this->user->isLoggedIn()) {
            return null;
        }
        
        return [
            'id' => $_SESSION['user_id'] ?? null,
            'name' => $_SESSION['username'] ?? null,
            'email' => $_SESSION['user_email'] ?? null,
            'role' => $_SESSION['user_role'] ?? 'user',
            'is_admin' => $_SESSION['is_admin'] ?? false
        ];
    }
    
    /**
     * Vérifie si l'utilisateur actuel peut accéder à une ressource
     */
    public function canAccess($resource, $action = 'read') {
        if (!$this->user->isLoggedIn()) {
            return false;
        }
        
        $currentUser = $this->getCurrentUser();
        
        // Les admins peuvent tout faire
        if ($currentUser['is_admin']) {
            return true;
        }
        
        // Logique d'autorisation basée sur les ressources
        switch ($resource) {
            case 'users':
                return $action === 'read' || $currentUser['is_admin'];
            
            case 'posts':
                return true; // Tous les utilisateurs connectés peuvent lire/écrire des posts
            
            case 'elections':
                return $action === 'read' || $action === 'vote';
            
            case 'events':
                return true; // Tous les utilisateurs peuvent voir et participer aux événements
            
            default:
                return false;
        }
    }
    
    /**
     * Démarre une session si elle n'existe pas
     */
    public function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}

// Fonction helper globale
function auth() {
    static $auth = null;
    if ($auth === null) {
        $auth = new AuthMiddleware();
        $auth->startSession();
    }
    return $auth;
}
