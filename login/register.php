<?php
session_start();
require 'config.php';

$nameError = $surnameError = $emailError = $passwordError = '';
$name = $surname = $email = $password = '';

if (isset($_POST["register"])) {
    $valid = true;

    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $email = trim($_POST["email"]);

    // Validation des champs
    if (empty($name)) {
        $nameError = "Le nom est requis.";
        $valid = false;
    }

    if (empty($surname)) {
        $surnameError = "Le prénom est requis.";
        $valid = false;
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "L'email est invalide.";
        $valid = false;
    }

    

    // Vérification si l'email existe déjà
    if($valid){
        $stmt = $conn->prepare("SELECT id FROM all_users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $_SESSION['error'] = "Cet email est déjà utilisé.";
            header("Location: register_user.php?status=error"); // 🔄 On reste sur la page d'inscription
            exit();
        } else {
            // Hasher le mot de passe
            $hashed_password = "AECGS";
            $full_name = $name." ".$surname;
            $acc = "US";
            // Insérer l'utilisateur dans la base de données
            $stmt = $conn->prepare("INSERT INTO all_users (name, email, password,acctype) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $full_name, $email, $hashed_password,$acc);
    
            if ($stmt->execute()) {
                include "../send_email.php";
                header("Location: ../index.php?status=created");
                exit();
            } else {
                header("Location: register_user.php?status=error");
                exit();
            }
        }
    }

        $_SESSION['nameError'] = $nameError;
        $_SESSION['surnameError'] = $surnameError;
        $_SESSION['emailError'] = $emailError;
        $_SESSION['passwordError'] = $passwordError;

        header("Location: register.php");
        exit();

}
