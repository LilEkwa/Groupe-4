<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

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

        // Destinataires
        $mail->setFrom('aegcscanada@gmail.com', 'AEGCS');
        $mail->addAddress($email, "Utilisateur");

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Code de modification';
        $mail->Body    = "
            <h1>Bonjour,</h1>
            <p>Nous avons reçu dans nos serveurs une demande de modification de mot de passe. Code de modification :</p>
            <span style='display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #4CAF50; text-decoration: none; border-radius: 5px;'>$reset_code</span>
            <p>Si vous n'avez pas initié cette demande, veuillez ignorer cet email.</p>
            <p>Cordialement,<br>L'équipe AEGCS</p>
        ";

        $mail->send();
        echo 'Message envoyé avec succès';
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur de Mailer : {$mail->ErrorInfo}";
    }
}
?>
