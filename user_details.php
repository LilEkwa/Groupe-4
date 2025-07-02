<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
require_once __DIR__ . '/../auth/User.php';
$auth = auth();
$auth->requireAdmin();
$userManager = new User();
$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    header('Location: ../users_list.php');
    exit;
}
$user = $userManager->getUserById($user_id);
if (!$user) {
    header('Location: ../users_list.php');
    exit;
}
include '../head.php';
include '../navbar.php';
?>
<div class="container py-5">
    <h2 class="mb-4"><i class="ri-user-line me-2"></i>Détails de l'utilisateur</h2>
    <div class="card shadow p-4" style="max-width: 500px; margin:auto;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID :</strong> <?= htmlspecialchars($user['id']) ?></li>
            <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($user['last_name']) ?></li>
            <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($user['first_name']) ?></li>
            <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></li>
            <li class="list-group-item"><strong>Rôle :</strong> <?= $user['role'] === 'admin' ? 'Administrateur' : 'Utilisateur' ?></li>
            <li class="list-group-item"><strong>Statut :</strong> <?= $user['is_active'] ? 'Actif' : 'Inactif' ?></li>
            <li class="list-group-item"><strong>Email vérifié :</strong> <?= $user['email_verified'] ? 'Oui' : 'Non' ?></li>
            <li class="list-group-item"><strong>Inscription :</strong> <?= date('d/m/Y', strtotime($user['created_at'])) ?></li>
            <li class="list-group-item"><strong>Dernière connexion :</strong> <?= $user['last_login'] ? date('d/m/Y H:i', strtotime($user['last_login'])) : 'Jamais' ?></li>
        </ul>
        <div class="d-flex justify-content-between mt-4">
            <a href="user_edit.php?id=<?= $user['id'] ?>" class="btn btn-warning"><i class="ri-edit-line me-1"></i>Modifier</a>
            <a href="../users_list.php" class="btn btn-outline-secondary"><i class="ri-arrow-left-line me-2"></i>Retour à la liste</a>
        </div>
    </div>
</div>
<?php include '../footer.php'; ?>
