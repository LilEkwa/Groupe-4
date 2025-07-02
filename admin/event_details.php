<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
$auth = auth();
$auth->requireAdmin();
require_once __DIR__ . '/../auth/Database.php';
$db = new Database();
$event_id = $_GET['id'] ?? null;
if (!$event_id) { header('Location: events_list.php'); exit; }
$stmt = $db->prepare('SELECT * FROM events WHERE id = ?');
$stmt->bind_param('i', $event_id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();
if (!$event) { header('Location: events_list.php'); exit; }
include '../head.php';
include '../navbar.php';
?>
<div class="container py-5">
    <h2 class="mb-4"><i class="ri-eye-line me-2"></i>Détails de l'événement</h2>
    <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID :</strong> <?= htmlspecialchars($event['id']) ?></li>
            <li class="list-group-item"><strong>Titre :</strong> <?= htmlspecialchars($event['title']) ?></li>
            <li class="list-group-item"><strong>Description :</strong> <?= htmlspecialchars($event['description']) ?></li>
            <li class="list-group-item"><strong>Date début :</strong> <?= date('d/m/Y H:i', strtotime($event['start_date'])) ?></li>
            <li class="list-group-item"><strong>Date fin :</strong> <?= date('d/m/Y H:i', strtotime($event['end_date'])) ?></li>
            <li class="list-group-item"><strong>Lieu :</strong> <?= htmlspecialchars($event['location']) ?></li>
            <li class="list-group-item"><strong>Statut :</strong> <?= $event['status'] === 'upcoming' ? 'À venir' : ($event['status'] === 'ongoing' ? 'En cours' : 'Terminé') ?></li>
            <li class="list-group-item"><strong>Créé par (ID) :</strong> <?= htmlspecialchars($event['created_by']) ?></li>
        </ul>
        <div class="d-flex justify-content-between mt-4">
            <a href="event_edit.php?id=<?= $event['id'] ?>" class="btn btn-warning"><i class="ri-edit-line me-1"></i>Modifier</a>
            <a href="events_list.php" class="btn btn-outline-secondary"><i class="ri-arrow-left-line me-2"></i>Retour à la liste</a>
        </div>
    </div>
</div>
<?php include '../footer.php'; ?>
