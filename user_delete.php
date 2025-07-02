<?php
require_once __DIR__ . '/../auth/AuthMiddleware.php';
require_once __DIR__ . '/../auth/User.php';
$auth = auth();
$auth->requireAdmin();
$userManager = new User();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $user_id = intval($_POST['id']);
    if ($user_id !== $auth->getCurrentUser()['id']) {
        $userManager->deleteUser($user_id);
    }
}
header('Location: ../users_list.php');
exit;
