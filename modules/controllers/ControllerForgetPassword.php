<?php

namespace controllers;
use models\ModelTenrac;
use views\ViewForgetPassword;
use views\ViewPasswordResetConfirmation;

class ControllerForgetPassword
{
public function execute (): void
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $user = (new ModelTenrac())->getMail($email);
        if ($user) {
            $subject = 'Réinitialisation de votre mot de passe';
            $message = "Bonjour,\n\nVoici le lien pour réinitialiser votre mot de passe : [lien ici]";
            $headers = 'From: no-reply@tenraclovers.com' . "\r\n" .
                'Reply-To: no-reply@tenraclovers.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            // Tentative d'envoi de l'e-mail
            if (mail($email, $subject, $message, $headers)) {
                (new ViewPasswordResetConfirmation())->show();
            }
        } else {
            // Si pas de soumission de formulaire, affichage du formulaire
            (new ViewForgetPassword())->show();
        }
    }




}
}