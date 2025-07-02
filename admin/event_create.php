<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
$auth = auth();
$auth->requireAdmin();
require_once __DIR__ . '/../auth/Database.php';
$db = new Database();
$message = null;
$type = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['end_date'] ?? '';
    $location = trim($_POST['location'] ?? '');
    $status = $_POST['status'] ?? 'upcoming';
    $created_by = $auth->getCurrentUser()['id'];
    if ($title && $start_date && $end_date) {
        $stmt = $db->prepare('INSERT INTO events (title, description, start_date, end_date, location, status, created_by) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssssi', $title, $description, $start_date, $end_date, $location, $status, $created_by);
        if ($stmt->execute()) {
            $message = 'Événement créé avec succès.';
            $type = 'success';
        } else {
            $message = 'Erreur lors de la création.';
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
    <h2 class="mb-4"><i class="ri-add-line me-2"></i>Créer un événement</h2>
    <?php if ($message): ?>
        <div class="alert alert-<?= $type ?>"> <?= htmlspecialchars($message) ?> </div>
    <?php endif; ?>
    <form method="POST" class="card p-4 shadow" style="max-width: 600px; margin:auto;">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="datetime-local" class="form-control" name="start_date" id="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="datetime-local" class="form-control" name="end_date" id="end_date" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lieu</label>
            <input type="text" class="form-control" name="location" id="location">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-select" name="status" id="status">
                <option value="upcoming">À venir</option>
                <option value="ongoing">En cours</option>
                <option value="completed">Terminé</option>
            </select>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Créer</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="events_list.php" class="btn btn-outline-secondary"><i class="ri-arrow-left-line me-2"></i>Retour à la liste</a>
    </div>
</div>
<?php include '../footer.php'; ?>
