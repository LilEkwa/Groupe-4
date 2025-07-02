<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
require_once __DIR__ . '/../auth/User.php';
include('../head.php');
?>
<body>
    <?php include('../spinner.php'); ?>
    <?php include('../topbar.php'); ?>
    <div class="container-fluid position-relative p-0">
        <?php include('admin_navbar.php'); ?>
    </div>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><i class="ri-team-line me-2"></i>Liste des utilisateurs</h2>
            <a href="user_create.php" class="btn btn-success"><i class="ri-user-add-line me-2"></i>Créer un utilisateur</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Inscription</th>
                        <th>Dernière Connexion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $auth = auth();
                    $auth->requireAdmin();
                    $userManager = new User();
                    $users = $userManager->getAllUsers();
                    foreach ($users as $user):
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['last_name']) ?></td>
                            <td><?= htmlspecialchars($user['first_name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?>
                                <?php if ($user['email_verified']): ?>
                                    <span class="badge bg-success ms-1">Vérifié</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark ms-1">Non vérifié</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?= $user['role'] === 'admin' ? 'bg-success' : 'bg-secondary' ?>">
                                    <?= $user['role'] === 'admin' ? 'Admin' : 'Utilisateur' ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge <?= $user['is_active'] ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $user['is_active'] ? 'Actif' : 'Inactif' ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
                            <td><?= $user['last_login'] ? date('d/m/Y H:i', strtotime($user['last_login'])) : 'Jamais' ?></td>
                            <td>
                                <a href="user_details.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-info me-1" title="Détails"><i class="ri-eye-line"></i></a>
                                <a href="user_edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning me-1" title="Éditer"><i class="ri-edit-line"></i></a>
                                <?php if ($user['role'] !== 'admin' || $user['id'] != $auth->getCurrentUser()['id']): ?>
                                <form method="POST" action="user_delete.php" style="display:inline;" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer"><i class="ri-delete-bin-line"></i></button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('../footer.php'); ?>
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
    <?php include('../script.php'); ?>
</body>
</html>
