<?php
require_once __DIR__ . '/auth/AuthMiddleware.php';

// Vérifier que l'utilisateur est admin
$auth = auth();
$auth->requireAdmin();

$currentUser = $auth->getCurrentUser();
include 'head.php';
include 'navbar.php';
?>

<div class="container mt-5">
    <h1 class="mb-4">Dashboard Administrateur</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Gestion des Utilisateurs</h5>
                    <p class="card-text">Ajouter, modifier ou supprimer des utilisateurs.</p>
                    <a href="users_list.php" class="btn btn-primary">Gérer les utilisateurs</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Gestion des Événements</h5>
                    <p class="card-text">Ajouter, modifier ou supprimer des événements.</p>
                    <a href="event.php" class="btn btn-primary">Gérer les événements</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
