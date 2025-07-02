<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_verification_email($name, $surname, $email) {
    $verification_link = "http://localhost/Groupe-4/login/verify.php?email=$email&code=" . md5($email);

    try {
        // Créer l'objet PHPMailer
        $mail = new PHPMailer(true);

        // Configurer le serveur SMTP (Mailtrap ici)
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Username   = '94bd77753c724e'; // remplace par tes vrais identifiants
        $mail->Password   = '9c1534d983cf9f';
        $mail->Port       = 2525;

        // Expéditeur / Destinataire
        $mail->setFrom('no-reply@aecgs.local', 'AECGS');
        $mail->addAddress($email, "$name $surname");

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Confirmez votre compte';
        $mail->Body    = "
            <h1>Bonjour $name $surname,</h1>
            <p>Merci pour votre inscription. Veuillez cliquer ci-dessous pour vérifier votre adresse e-mail :</p>
            <a href='$verification_link' style='padding:10px 20px;background:#28a745;color:#fff;text-decoration:none;border-radius:5px;'>Confirmer mon compte</a>
        ";
        $mail->AltBody = "Bonjour $name $surname,\n\nCliquez ici pour vérifier : $verification_link";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Erreur lors de l'envoi du mail: " . $mail->ErrorInfo);
        return false;
    }
}
?>
