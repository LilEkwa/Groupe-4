<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

     // Récupération et nettoyage des données du formulaire
    $username = trim($_POST['username'] ?? '');
    $surname = trim($_POST['surname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $full_name = $username . ' ' . $surname;
    $account_type = "US";
    $errors = [];

    // Validations
    if (empty($username)) {
        $errors[] = "Le nom est requis.";
    }
    if (empty($surname)) {
        $errors[] = "Le prénom est requis.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email est invalide.";
    }
    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Le mot de passe doit faire au moins 6 caractères.";
    }

    // Vérifier si l'email existe déjà
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['error'] = "Cet email est déjà utilisé.";
            header("Location: register_user.php");
            exit();
        }

        // Insertion dans la base de données
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, surname, password,full_name, account_type) VALUES (?, ?,?, ?,?, ?)");
        $stmt->bind_param("ssssss", $username, $email, $surname, $hashed_password, $full_name, $account_type);

        if ($stmt->execute()) {
            require_once '../send_email.php';
            send_verification_email($username, $surname, $email);
            $_SESSION['registration_success'] = "Inscription réussie. Vous pouvez maintenant vous connecter.";
            header("Location: ../login.php");
            exit();
        } 
        else {
            $_SESSION['error'] = "Erreur lors de l'enregistrement.";
            header("Location: ../register.php");
            exit();
        }
    }

    // Si erreurs, on les enregistre dans la session
    $_SESSION['form_errors'] = $errors;
    header("Location: ../register.php");
    exit();
}

?>
