# Système d'Authentification AECGS - Refactorisé

## Vue d'ensemble du projet

**AECGS** (Association des Étudiants Camerounais du Grand Sudbury) est une plateforme web complète pour gérer les activités d'une association étudiante avec les fonctionnalités suivantes :

### 🎯 Fonctionnalités principales
- **Système d'authentification sécurisé** (inscription, connexion, réinitialisation)
- **Gestion des utilisateurs** (profils, permissions, administration)
- **Blog/Articles** avec système de commentaires modérés
- **Système d'élections** avec candidats et votes sécurisés
- **Gestion d'événements** avec inscriptions et participation
- **Dashboard administrateur** pour la gestion globale
- **Système de notifications** en temps réel
- **Pages d'information** (FAQ, à propos, contact)

## 🔧 Architecture du système d'authentification

### Structure des fichiers
```
auth/
├── Database.php          # Gestionnaire de base de données
├── User.php             # Modèle utilisateur principal
├── AuthMiddleware.php   # Middleware d'authentification
├── EmailService.php     # Service d'envoi d'emails
├── login.php           # Page de connexion
├── register.php        # Page d'inscription
├── logout.php          # Script de déconnexion
├── forgot-password.php # Demande de réinitialisation
├── reset-password.php  # Réinitialisation du mot de passe
└── verify-email.php    # Vérification d'email
```

### Base de données modernisée

La table `users` utilise maintenant un schéma moderne :

```sql
CREATE TABLE `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `role` ENUM('user', 'admin') DEFAULT 'user',
    `is_active` BOOLEAN DEFAULT TRUE,
    `email_verified` BOOLEAN DEFAULT FALSE,
    `verification_token` VARCHAR(255) NULL,
    `reset_token` VARCHAR(255) NULL,
    `reset_token_expires` TIMESTAMP NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `last_login` TIMESTAMP NULL
);
```

## 🚀 Utilisation

### 1. Inscription d'un utilisateur
```php
require_once 'auth/User.php';
$user = new User();
$result = $user->register($firstName, $lastName, $email, $password);
```

### 2. Connexion
```php
require_once 'auth/User.php';
$user = new User();
$result = $user->login($email, $password);
```

### 3. Vérification d'authentification
```php
require_once 'auth/AuthMiddleware.php';
$auth = auth();

// Vérifier si connecté
if ($auth->isLoggedIn()) {
    // Utilisateur connecté
}

// Forcer la connexion
$auth->requireLogin();

// Forcer l'accès admin
$auth->requireAdmin();
```

### 4. Récupération des informations utilisateur
```php
$currentUser = $auth->getCurrentUser();
echo "Bonjour " . $currentUser['name'];
```

## 🔐 Fonctionnalités de sécurité

### Hachage des mots de passe
- Utilisation de `password_hash()` avec `PASSWORD_BCRYPT`
- Vérification avec `password_verify()`

### Tokens sécurisés
- Tokens de vérification email : 32 bytes aléatoires
- Tokens de réinitialisation : expiration 1 heure
- Génération avec `bin2hex(random_bytes(32))`

### Validation des données
- Validation côté client (JavaScript)
- Validation côté serveur (PHP)
- Échappement des données d'affichage
- Protection contre l'injection SQL (requêtes préparées)

### Gestion des sessions
- Sessions sécurisées avec données minimales
- Mise à jour de `last_login`
- Nettoyage automatique lors de la déconnexion

## 📧 Système d'emails

Le service EmailService utilise PHPMailer pour :
- Vérification d'email après inscription
- Réinitialisation de mot de passe
- Templates HTML responsives

### Configuration email
```php
// Dans EmailService.php
$this->mailer->Host = 'your-smtp-server.com';
$this->mailer->Username = 'your-email@domain.com';
$this->mailer->Password = 'your-password';
```

## 🎨 Interface utilisateur

### Design moderne
- Interface responsive (Bootstrap 5)
- Gradients et animations CSS
- Icônes Remix Icons
- Notifications Notyf
- Indicateur de force du mot de passe

### Pages d'authentification
- **Login** : Interface épurée avec toggle password
- **Register** : Validation en temps réel
- **Forgot Password** : Processus guidé
- **Reset Password** : Sécurisé avec tokens

## 🔧 Installation et configuration

### 1. Base de données
```sql
-- Exécuter le fichier database/aecgs.sql
-- Ou importer via phpMyAdmin
```

### 2. Configuration
```php
// Dans auth/Database.php
private $host = 'localhost';
private $username = 'root';
private $password = '';
private $database = 'aecgs';
```

### 3. Dépendances
```bash
# PHPMailer (optionnel, pour les emails)
composer require phpmailer/phpmailer
```

## 🧪 Migration depuis l'ancien système

### Données existantes
L'ancien système utilisait la table `all_users`. Pour migrer :

```sql
-- Migrer les données vers la nouvelle table
INSERT INTO users (first_name, last_name, email, password, role, email_verified)
SELECT 
    SUBSTRING_INDEX(name, ' ', 1) as first_name,
    SUBSTRING_INDEX(name, ' ', -1) as last_name,
    email,
    password,
    CASE WHEN acctype = 'AD' THEN 'admin' ELSE 'user' END as role,
    CASE WHEN authentified = 'O' THEN TRUE ELSE FALSE END as email_verified
FROM all_users;
```

### Mise à jour des fichiers
Les fichiers suivants ont été mis à jour :
- `topbar.php` - Nouveau système d'authentification
- `navbar.php` - Menu utilisateur modernisé
- `admin_dashboard.php` - Vérification admin sécurisée

## 📝 API Reference

### Classe User
```php
// Inscription
register($firstName, $lastName, $email, $password)

// Connexion
login($email, $password)

// Vérification email
verifyEmail($token)

// Demande réinitialisation
requestPasswordReset($email)

// Réinitialisation
resetPassword($token, $newPassword)

// Récupération données
getUserById($id)
getAllUsers()
```

### Classe AuthMiddleware
```php
// Vérifications
requireLogin($redirectUrl = '/auth/login.php')
requireAdmin($redirectUrl = '/index.php')
isLoggedIn()

// Données utilisateur
getCurrentUser()

// Permissions
canAccess($resource, $action = 'read')
```

## 🛡️ Bonnes pratiques de sécurité

1. **Mots de passe** : Minimum 6 caractères, hachage BCrypt
2. **Tokens** : Expiration courte, usage unique
3. **Sessions** : Données minimales, nettoyage automatique
4. **Validation** : Double validation (client/serveur)
5. **HTTPS** : Recommandé pour la production
6. **Base de données** : Requêtes préparées obligatoires

## 📊 Améliorations futures possibles

- [ ] Authentification à deux facteurs (2FA)
- [ ] OAuth (Google, Facebook)
- [ ] Logs de sécurité détaillés
- [ ] Rate limiting
- [ ] Cache Redis pour les sessions
- [ ] API REST pour applications mobiles

## 🐛 Dépannage

### Problèmes courants

1. **Emails non reçus** : Vérifier la configuration SMTP
2. **Sessions perdues** : Vérifier les cookies et HTTPS
3. **Erreurs de base de données** : Vérifier les permissions
4. **Tokens expirés** : Regenerer via forgot-password

### Logs
Les erreurs sont loggées via `error_log()`. Vérifier :
- Logs Apache/Nginx
- Logs PHP (`php_errors.log`)
- Console navigateur pour erreurs JavaScript

## 📞 Support

Pour toute question ou problème :
- Email : info.cameroungrandsudbury@gmail.com
- Documentation interne : Ce fichier README

---

*Système développé pour l'AECGS - Association des Étudiants Camerounais du Grand Sudbury*
