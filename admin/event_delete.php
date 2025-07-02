<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
$auth = auth();
$auth->requireAdmin();
require_once __DIR__ . '/../auth/Database.php';
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $event_id = intval($_POST['id']);
    $stmt = $db->prepare('DELETE FROM events WHERE id = ?');
    $stmt->bind_param('i', $event_id);
    $stmt->execute();
}
header('Location: events_list.php');
exit;
