<?php
require_once 'User.php';

$token = $_GET['token'] ?? '';

if (empty($token)) {
    header('Location: ../index.php?message=' . urlencode('Token de vérification manquant.') . '&type=error');
    exit();
}

$user = new User();
$result = $user->verifyEmail($token);

if ($result['success']) {
    header('Location: login.php?message=' . urlencode($result['message']) . '&type=success');
} else {
    header('Location: register.php?message=' . urlencode($result['message']) . '&type=error');
}
exit();
