<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $verification_link = "https://cameroungrandsudbury.ca/login/verify.php?email=$email&code=" . md5($email);

    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'aegcscanada@gmail.com'; // Remplacez par votre adresse email
        $mail->Password = 'fqmn hyuj jtwk xpvc'; // Remplacez par votre mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';

        // Destinataires
        $mail->setFrom('aegcscanada@gmail.com', 'AEGCS');
        $mail->addAddress($email, "$name $surname");

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Confirmez votre compte';
        $mail->Body    = "
            <h1>Bonjour $name $surname,</h1>
            <p>Merci de vous être inscrit sur notre site. Veuillez cliquer sur le lien ci-dessous pour confirmer votre compte :</p>
            <a href='$verification_link' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #4CAF50; text-decoration: none; border-radius: 5px;'>Confirmer mon compte</a>
            <p>Si vous n'avez pas demandé la création de ce compte, veuillez ignorer cet email.</p>
            <p>Cordialement,<br>L'équipe AECGS</p>
        ";
        $mail->AltBody = "Bonjour $name $surname,\n\nMerci de vous être inscrit sur notre site. Veuillez cliquer sur le lien ci-dessous pour confirmer votre compte :\n\n$verification_link\n\nSi vous n'avez pas demandé la création de ce compte, veuillez ignorer cet email.\n\nCordialement,\nL'équipe AECGS";

        $mail->send();
        echo 'Message envoyé avec succès';
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur de Mailer : {$mail->ErrorInfo}";
    }
}
?>
