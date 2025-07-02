<?php
require_once 'User.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
    exit();
}

$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$terms = isset($_POST['terms']);

// Validations côté serveur
if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Tous les champs sont requis.']);
    exit();
}

if ($password !== $confirm_password) {
    echo json_encode(['success' => false, 'message' => 'Les mots de passe ne correspondent pas.']);
    exit();
}

if (!$terms) {
    echo json_encode(['success' => false, 'message' => 'Vous devez accepter les conditions d\'utilisation.']);
    exit();
}

$user = new User();
$result = $user->register($first_name, $last_name, $email, $password);

echo json_encode($result);
