<?php
require_once __DIR__ . '/auth/AuthMiddleware.php';
$auth = auth();
$currentUser = $auth->getCurrentUser();
?>

<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0">
        <img src="img/logo.jpg" alt="Logo AECGS" style="max-height: 60px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link">Accueil</a>
            <a href="about.php" class="nav-item nav-link">À propos</a>
            <a href="blog.php" class="nav-item nav-link">Blog</a>
            <a href="election.php" class="nav-item nav-link">Élections</a>
            <a href="event.php" class="nav-item nav-link">Événements</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            
            <?php if ($currentUser): ?>
                <!-- Menu utilisateur connecté -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-user me-1"></i><?= htmlspecialchars($currentUser['name']) ?>
                    </a>
                    <div class="dropdown-menu bg-light rounded-0 m-0">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> Mon Profil</a>
                        <?php if ($currentUser['is_admin']): ?>
                            <a href="admin_dashboard.php" class="dropdown-item"><i class="fas fa-cog me-2"></i> Dashboard Admin</a>
                            <a href="users_list.php" class="dropdown-item"><i class="fas fa-users me-2"></i> Utilisateurs</a>
                        <?php endif; ?>
                        <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                        <div class="dropdown-divider"></div>
                        <a href="auth/logout.php" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Déconnexion</a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Menu utilisateur non connecté -->
                <a href="auth/login.php" class="nav-item nav-link">
                    <i class="fa fa-sign-in-alt me-1"></i>Connexion
                </a>
                <a href="auth/register.php" class="nav-item nav-link">
                    <i class="fa fa-user-plus me-1"></i>Inscription
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>
