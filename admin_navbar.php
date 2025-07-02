<?php
$auth = auth();
$currentUser = $auth->getCurrentUser();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success px-4 px-lg-5 py-3 py-lg-0">
    <a href="admin_dashboard.php" class="navbar-brand p-0">
        <img src="../img/logo.jpg" alt="Logo AECGS" style="max-height: 60px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="admin_dashboard.php" class="nav-item nav-link">Dashboard</a>
            <a href="users_list.php" class="nav-item nav-link">Utilisateurs</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Événements</a>
                <div class="dropdown-menu bg-light rounded-0 m-0">
                    <a href="events_list.php" class="dropdown-item"><i class="ri-calendar-event-line me-2"></i>Liste des événements</a>
                    <a href="event_create.php" class="dropdown-item"><i class="ri-add-line me-2"></i>Créer un événement</a>
                </div>
            </div>
            <a href="../index.php" class="nav-item nav-link">Site public</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user me-1"></i><?= htmlspecialchars($currentUser['first_name'] ?? '') ?>
                </a>
                <div class="dropdown-menu bg-light rounded-0 m-0">
                    <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> Mon Profil</a>
                    <a href="../auth/logout.php" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Déconnexion</a>
                </div>
            </div>
        </div>
    </div>
</nav>
