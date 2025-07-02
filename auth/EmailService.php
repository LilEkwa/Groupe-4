<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailService {
    private $mailer;
    
    public function __construct() {
        $this->mailer = new PHPMailer(true);
        $this->configureMailer();
    }
    
    private function configureMailer() {
        try {
            // Configuration SMTP
            $this->mailer->isSMTP();
            $this->mailer->Host       = 'localhost'; // Changer selon votre configuration
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = 'noreply@aecgs.com'; // Changer selon votre configuration
            $this->mailer->Password   = 'your_password'; // Changer selon votre configuration
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port       = 587;
            
            // Paramètres par défaut
            $this->mailer->setFrom('noreply@aecgs.com', 'AECGS');
            $this->mailer->isHTML(true);
            $this->mailer->CharSet = 'UTF-8';
            
        } catch (Exception $e) {
            error_log("Erreur configuration email: " . $e->getMessage());
        }
    }
    
    public function sendVerificationEmail($email, $name, $token) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($email, $name);
            
            $this->mailer->Subject = 'Vérification de votre compte AECGS';
            
            $verificationLink = "http://localhost/Groupe-4/auth/verify-email.php?token=" . $token;
            
            $this->mailer->Body = $this->getVerificationEmailTemplate($name, $verificationLink);
            
            return $this->mailer->send();
            
        } catch (Exception $e) {
            error_log("Erreur envoi email de vérification: " . $e->getMessage());
            return false;
        }
    }
    
    public function sendPasswordResetEmail($email, $name, $token) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($email, $name);
            
            $this->mailer->Subject = 'Réinitialisation de votre mot de passe AECGS';
            
            $resetLink = "http://localhost/Groupe-4/auth/reset-password.php?token=" . $token;
            
            $this->mailer->Body = $this->getPasswordResetEmailTemplate($name, $resetLink);
            
            return $this->mailer->send();
            
        } catch (Exception $e) {
            error_log("Erreur envoi email de réinitialisation: " . $e->getMessage());
            return false;
        }
    }
    
    private function getVerificationEmailTemplate($name, $verificationLink) {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 20px 0; }
                .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #666; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>🎓 AECGS</h2>
                    <p>Association des Étudiants Camerounais du Grand Sudbury</p>
                </div>
                <div class='content'>
                    <h3>Bienvenue, $name !</h3>
                    <p>Merci de vous être inscrit(e) sur notre plateforme. Pour compléter votre inscription, veuillez vérifier votre adresse email en cliquant sur le bouton ci-dessous :</p>
                    
                    <div style='text-align: center;'>
                        <a href='$verificationLink' class='button'>Vérifier mon email</a>
                    </div>
                    
                    <p>Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :</p>
                    <p style='word-break: break-all; background: #e9e9e9; padding: 10px; border-radius: 5px;'>$verificationLink</p>
                    
                    <p><strong>Important :</strong> Ce lien expire dans 24 heures pour des raisons de sécurité.</p>
                    
                    <p>Si vous n'avez pas créé de compte sur notre site, ignorez simplement cet email.</p>
                </div>
                <div class='footer'>
                    <p>© 2025 AECGS - Association des Étudiants Camerounais du Grand Sudbury</p>
                    <p>Sudbury, Ontario, Canada</p>
                </div>
            </div>
        </body>
        </html>
        ";
    }
    
    private function getPasswordResetEmailTemplate($name, $resetLink) {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 20px 0; }
                .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #666; }
                .warning { background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; border-radius: 5px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>🔒 Réinitialisation de mot de passe</h2>
                    <p>AECGS</p>
                </div>
                <div class='content'>
                    <h3>Bonjour $name,</h3>
                    <p>Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte AECGS.</p>
                    
                    <div style='text-align: center;'>
                        <a href='$resetLink' class='button'>Réinitialiser mon mot de passe</a>
                    </div>
                    
                    <p>Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :</p>
                    <p style='word-break: break-all; background: #e9e9e9; padding: 10px; border-radius: 5px;'>$resetLink</p>
                    
                    <div class='warning'>
                        <strong>Important :</strong> Ce lien expire dans 1 heure pour des raisons de sécurité.
                    </div>
                    
                    <p>Si vous n'avez pas demandé cette réinitialisation, ignorez simplement cet email. Votre mot de passe restera inchangé.</p>
                </div>
                <div class='footer'>
                    <p>© 2025 AECGS - Association des Étudiants Camerounais du Grand Sudbury</p>
                    <p>Sudbury, Ontario, Canada</p>
                </div>
            </div>
        </body>
        </html>
        ";
    }
}
