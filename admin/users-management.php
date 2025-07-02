<?php
require_once __DIR__ . '/auth/AuthMiddleware.php';
require_once __DIR__ . '/auth/User.php';

// Vérifier que l'utilisateur est admin
$auth = auth();
$auth->requireAdmin();

$currentUser = $auth->getCurrentUser();
$userManager = new User();

// Traitement des actions (activation/désactivation/suppression)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $userId = $_POST['user_id'] ?? 0;
    
    if ($userId && $userId != $currentUser['id']) { // Empêcher l'admin de se modifier lui-même
        switch ($action) {
            case 'toggle_status':
                $userManager->toggleUserStatus($userId);
                $message = "Statut utilisateur modifié avec succès.";
                $type = "success";
                break;
            case 'delete':
                $userManager->deleteUser($userId);
                $message = "Utilisateur supprimé avec succès.";
                $type = "success";
                break;
            case 'make_admin':
                $userManager->updateUserRole($userId, 'admin');
                $message = "Utilisateur promu administrateur.";
                $type = "success";
                break;
            case 'make_user':
                $userManager->updateUserRole($userId, 'user');
                $message = "Privilèges administrateur révoqués.";
                $type = "success";
                break;
        }
    }
}

// Récupérer la liste des utilisateurs
$users = $userManager->getAllUsers();
$totalUsers = count($users);
$activeUsers = count(array_filter($users, function($user) { return $user['is_active']; }));
$adminUsers = count(array_filter($users, function($user) { return $user['role'] === 'admin'; }));

include 'head.php';
include 'navbar.php';
?>

<!-- CSS personnalisé pour la charte graphique -->
<style>
    .admin-header {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
    }
    
    .stats-card {
        border-left: 4px solid #28a745;
        transition: transform 0.2s;
    }
    
    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
    }
    
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #28a745, #20c997);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 14px;
    }
    
    .action-btn {
        margin: 0 2px;
        border-radius: 20px;
        padding: 5px 12px;
        font-size: 12px;
    }
    
    .status-active {
        color: #28a745;
        font-weight: bold;
    }
    
    .status-inactive {
        color: #dc3545;
        font-weight: bold;
    }
    
    .role-admin {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: bold;
    }
    
    .role-user {
        background: #e9ecef;
        color: #495057;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 11px;
    }
    
    .search-box {
        border: 2px solid #28a745;
        border-radius: 25px;
        padding: 10px 20px;
    }
    
    .search-box:focus {
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.3);
        border-color: #20c997;
    }
</style>

<div class="admin-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="mb-0">
                    <i class="ri-team-line me-3"></i>
                    Gestion des Utilisateurs
                </h1>
                <p class="mb-0 mt-2 opacity-75">Administration des comptes utilisateurs AECGS</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="auth/register.php" class="btn btn-light btn-lg">
                    <i class="ri-user-add-line me-2"></i>
                    Nouvel Utilisateur
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php if (isset($message)): ?>
        <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
            <i class="ri-check-line me-2"></i><?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card stats-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="ri-team-line text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 text-success"><?= $totalUsers ?></h3>
                            <p class="mb-0 text-muted">Total Utilisateurs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="ri-user-check-line text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 text-success"><?= $activeUsers ?></h3>
                            <p class="mb-0 text-muted">Utilisateurs Actifs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="ri-admin-line text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 text-success"><?= $adminUsers ?></h3>
                            <p class="mb-0 text-muted">Administrateurs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Barre de recherche -->
    <div class="row mb-4">
        <div class="col-md-6">
            <input type="text" id="searchUsers" class="form-control search-box" placeholder="🔍 Rechercher un utilisateur...">
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-success active" id="filterAll">Tous</button>
                <button type="button" class="btn btn-outline-success" id="filterActive">Actifs</button>
                <button type="button" class="btn btn-outline-success" id="filterInactive">Inactifs</button>
                <button type="button" class="btn btn-outline-success" id="filterAdmins">Admins</button>
            </div>
        </div>
    </div>

    <!-- Table des utilisateurs -->
    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-success">
                        <tr>
                            <th class="ps-4">Utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Statut</th>
                            <th>Inscription</th>
                            <th>Dernière Connexion</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <?php foreach ($users as $user): ?>
                            <tr data-user-id="<?= $user['id'] ?>" 
                                data-status="<?= $user['is_active'] ? 'active' : 'inactive' ?>"
                                data-role="<?= $user['role'] ?>">
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-3">
                                            <?= strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></div>
                                            <small class="text-muted">ID: <?= $user['id'] ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><?= htmlspecialchars($user['email']) ?></div>
                                    <?php if ($user['email_verified']): ?>
                                        <small class="text-success"><i class="ri-verified-badge-line"></i> Vérifié</small>
                                    <?php else: ?>
                                        <small class="text-warning"><i class="ri-error-warning-line"></i> Non vérifié</small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="role-<?= $user['role'] ?>">
                                        <?= $user['role'] === 'admin' ? 'Administrateur' : 'Utilisateur' ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="status-<?= $user['is_active'] ? 'active' : 'inactive' ?>">
                                        <?= $user['is_active'] ? 'Actif' : 'Inactif' ?>
                                    </span>
                                </td>
                                <td>
                                    <small><?= date('d/m/Y', strtotime($user['created_at'])) ?></small>
                                </td>
                                <td>
                                    <small>
                                        <?= $user['last_login'] ? date('d/m/Y H:i', strtotime($user['last_login'])) : 'Jamais' ?>
                                    </small>
                                </td>
                                <td class="text-center">
                                    <?php if ($user['id'] != $currentUser['id']): // Empêcher l'admin de se modifier ?>
                                        <div class="btn-group" role="group">
                                            <!-- Toggle Status -->
                                            <form method="POST" style="display: inline;">
                                                <input type="hidden" name="action" value="toggle_status">
                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                <button type="submit" 
                                                        class="btn <?= $user['is_active'] ? 'btn-outline-warning' : 'btn-outline-success' ?> action-btn"
                                                        title="<?= $user['is_active'] ? 'Désactiver' : 'Activer' ?>">
                                                    <i class="ri-<?= $user['is_active'] ? 'pause' : 'play' ?>-line"></i>
                                                </button>
                                            </form>

                                            <!-- Toggle Role -->
                                            <?php if ($user['role'] === 'user'): ?>
                                                <form method="POST" style="display: inline;">
                                                    <input type="hidden" name="action" value="make_admin">
                                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                    <button type="submit" class="btn btn-outline-primary action-btn" title="Promouvoir Admin">
                                                        <i class="ri-admin-line"></i>
                                                    </button>
                                                </form>
                                            <?php else: ?>
                                                <form method="POST" style="display: inline;">
                                                    <input type="hidden" name="action" value="make_user">
                                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                    <button type="submit" class="btn btn-outline-secondary action-btn" title="Rétrograder Utilisateur">
                                                        <i class="ri-user-line"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>

                                            <!-- Delete -->
                                            <form method="POST" style="display: inline;" 
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                <button type="submit" class="btn btn-outline-danger action-btn" title="Supprimer">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                        <span class="badge bg-info">Vous</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col-md-6">
            <p class="text-muted">Affichage de <?= count($users) ?> utilisateur(s)</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="admin_dashboard.php" class="btn btn-outline-secondary">
                <i class="ri-arrow-left-line me-2"></i>Retour au Dashboard
            </a>
        </div>
    </div>
</div>

<script>
// Fonctionnalité de recherche
document.getElementById('searchUsers').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('#usersTableBody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// Filtres
document.querySelectorAll('[id^="filter"]').forEach(btn => {
    btn.addEventListener('click', function() {
        // Gérer les classes actives
        document.querySelectorAll('[id^="filter"]').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        const filter = this.id.replace('filter', '').toLowerCase();
        const rows = document.querySelectorAll('#usersTableBody tr');
        
        rows.forEach(row => {
            let show = true;
            
            if (filter === 'active') {
                show = row.dataset.status === 'active';
            } else if (filter === 'inactive') {
                show = row.dataset.status === 'inactive';
            } else if (filter === 'admins') {
                show = row.dataset.role === 'admin';
            }
            
            row.style.display = show ? '' : 'none';
        });
    });
});

// Auto-refresh des notifications
setTimeout(() => {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        if (alert.classList.contains('alert-success')) {
            alert.remove();
        }
    });
}, 5000);
</script>

<!-- Ajouter Remix Icons si pas déjà inclus -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<?php include 'footer.php'; ?>
