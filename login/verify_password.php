<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aecgs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if (isset($_POST["verify"])) {
    $email = $_POST["email"];
    $code = $_POST["code"];

    $default_password = $_POST["password"];
    $new_password = $_POST["cpassword"];
    $confirm_password = $_POST["cpassword"]; // à séparer si tu veux 2 champs différents

    // Vérifie que le nouvel mdp et la confirmation sont identiques
    if ($new_password !== $confirm_password) {
        $_SESSION['error'] = 'Les mots de passe ne correspondent pas.';
        header("Location: verify.php?status=error&email=$email&code=$code");
        exit();
    }

    // Récupération de l'utilisateur
    $stmt = $conn->prepare("SELECT id, name, password, account_type, full_name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user || !password_verify($default_password, $user['password'])) {
        $_SESSION['error'] = 'Mot de passe par défaut incorrect.';
        header("Location: verify.php?status=error&email=$email&code=$code");
        exit();
    }

    // Mise à jour du mot de passe (hashé) et authentification
    $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);
    $update = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $update->bind_param("ss", $hashed_new_password, $email);
    $update->execute();

    // Connexion automatique
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['name'];
    $_SESSION['acctype'] = $user['acctype'];
    $_SESSION['success'] = 'Compte vérifié et connecté.';

    header('Location: ../index.php');
    exit();
}

?>