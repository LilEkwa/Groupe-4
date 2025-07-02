<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
require_once __DIR__ . '/../auth/User.php';
$auth = auth();
$auth->requireAdmin();
$userManager = new User();

$message = null;
$type = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = $_POST['role'] ?? 'user';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if ($password !== $confirm) {
        $message = "Les mots de passe ne correspondent pas.";
        $type = "danger";
    } else {
        $result = $userManager->register($first_name, $last_name, $email, $password);
        if ($result['success']) {
            // Mettre à jour le rôle si besoin
            if ($role === 'admin') {
                $userManager->updateUserRole($result['user_id'], 'admin');
            }
            $message = "Utilisateur créé avec succès.";
            $type = "success";
        } else {
            $message = $result['message'];
            $type = "danger";
        }
    }
}

include '../head.php';
include '../navbar.php';
?>
<div class="container py-5">
    <h2 class="mb-4"><i class="ri-user-add-line me-2"></i>Créer un utilisateur</h2>
    <?php if ($message): ?>
        <div class="alert alert-<?= $type ?>"> <?= htmlspecialchars($message) ?> </div>
    <?php endif; ?>
    <form method="POST" class="card p-4 shadow" style="max-width: 500px; margin:auto;">
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="first_name" id="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="last_name" id="last_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-select" name="role" id="role">
                <option value="user">Utilisateur</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" required minlength="6">
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" name="confirm" id="confirm" required minlength="6">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Créer</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="../users_list.php" class="btn btn-outline-secondary"><i class="ri-arrow-left-line me-2"></i>Retour à la liste</a>
    </div>
</div>
<?php include '../footer.php'; ?>
