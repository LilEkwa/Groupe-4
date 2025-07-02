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
$message = null;
$type = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['end_date'] ?? '';
    $location = trim($_POST['location'] ?? '');
    $status = $_POST['status'] ?? 'upcoming';
    if ($title && $start_date && $end_date) {
        $stmt = $db->prepare('UPDATE events SET title=?, description=?, start_date=?, end_date=?, location=?, status=? WHERE id=?');
        $stmt->bind_param('ssssssi', $title, $description, $start_date, $end_date, $location, $status, $event_id);
        if ($stmt->execute()) {
            $message = 'Événement modifié avec succès.';
            $type = 'success';
            $event = array_merge($event, compact('title','description','start_date','end_date','location','status'));
        } else {
            $message = 'Erreur lors de la modification.';
            $type = 'danger';
        }
    } else {
        $message = 'Veuillez remplir tous les champs obligatoires.';
        $type = 'danger';
    }
}
include '../head.php';
include '../navbar.php';
?>
<div class="container py-5">
    <h2 class="mb-4"><i class="ri-edit-line me-2"></i>Modifier l'événement</h2>
    <?php if ($message): ?>
        <div class="alert alert-<?= $type ?>"> <?= htmlspecialchars($message) ?> </div>
    <?php endif; ?>
    <form method="POST" class="card p-4 shadow" style="max-width: 600px; margin:auto;">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= htmlspecialchars($event['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"><?= htmlspecialchars($event['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="<?= date('Y-m-d\TH:i', strtotime($event['start_date'])) ?>" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="<?= date('Y-m-d\TH:i', strtotime($event['end_date'])) ?>" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lieu</label>
            <input type="text" class="form-control" name="location" id="location" value="<?= htmlspecialchars($event['location']) ?>">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-select" name="status" id="status">
                <option value="upcoming" <?= $event['status']==='upcoming'?'selected':'' ?>>À venir</option>
                <option value="ongoing" <?= $event['status']==='ongoing'?'selected':'' ?>>En cours</option>
                <option value="completed" <?= $event['status']==='completed'?'selected':'' ?>>Terminé</option>
            </select>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="events_list.php" class="btn btn-outline-secondary"><i class="ri-arrow-left-line me-2"></i>Retour à la liste</a>
    </div>
</div>
<?php include '../footer.php'; ?>
