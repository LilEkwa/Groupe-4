<?php
session_start(); // Démarre la session

// Supprimer toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou d'accueil
header('Location: ../index.php'); // ou vers index.php selon ton besoin
exit();
?>
