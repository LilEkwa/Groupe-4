<?php
require_once 'User.php';

$user = new User();
$result = $user->logout();

if ($result['success']) {
    header('Location: ../index.php?message=' . urlencode($result['message']) . '&type=success');
} else {
    header('Location: ../index.php?message=' . urlencode($result['message']) . '&type=error');
}
exit();
