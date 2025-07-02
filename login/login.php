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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérifier que les champs ne sont pas vides
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Tous les champs sont obligatoires.";
        header("Location: ../login.php");
        exit();
    }

    // Requête pour récupérer l'utilisateur
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); 

    if ($user) {
        // Vérifier le mot de passe
        if (password_verify($password, $user['password'])) {
            header("Location: verify.php");
            exit();
        } 
        else {
            $_SESSION['error'] = "Mot de passe incorrect.";
            header("Location: ../login.php");
            exit();
        }
    } 
    else {
        $_SESSION['error'] = "Aucun utilisateur trouvé avec cet email.";
        header("Location: ../login.php");
        exit();
    }
}
?>
