<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
$auth = auth();
$auth->requireAdmin();
require_once __DIR__ . '/../auth/Database.php';
$db = new Database();
$events = [];
$result = $db->query('SELECT * FROM events ORDER BY start_date DESC');
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}
include '../head.php';
include '../navbar.php';
?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="ri-calendar-event-line me-2"></i>Gestion des événements</h2>
        <a href="event_create.php" class="btn btn-success"><i class="ri-add-line me-2"></i>Créer un événement</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Lieu</th>
                    <th>Statut</th>
                    <th>Créé par</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= htmlspecialchars($event['id']) ?></td>
                    <td><?= htmlspecialchars($event['title']) ?></td>
                    <td><?= htmlspecialchars($event['description']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($event['start_date'])) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($event['end_date'])) ?></td>
                    <td><?= htmlspecialchars($event['location']) ?></td>
                    <td><span class="badge <?= $event['status'] === 'upcoming' ? 'bg-info' : ($event['status'] === 'ongoing' ? 'bg-success' : 'bg-secondary') ?>">
                        <?= $event['status'] === 'upcoming' ? 'À venir' : ($event['status'] === 'ongoing' ? 'En cours' : 'Terminé') ?>
                    </span></td>
                    <td><?= htmlspecialchars($event['created_by']) ?></td>
                    <td>
                        <a href="event_details.php?id=<?= $event['id'] ?>" class="btn btn-sm btn-info me-1" title="Détails"><i class="ri-eye-line"></i></a>
                        <a href="event_edit.php?id=<?= $event['id'] ?>" class="btn btn-sm btn-warning me-1" title="Éditer"><i class="ri-edit-line"></i></a>
                        <form method="POST" action="event_delete.php" style="display:inline;" onsubmit="return confirm('Supprimer cet événement ?');">
                            <input type="hidden" name="id" value="<?= $event['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger" title="Supprimer"><i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../footer.php'; ?>
