<?php

namespace controllers;
use models\ModelTenrac;
use views\ViewForgetPassword;

class ControllerForgetPassword
{
public function execute (): void{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        if (isset($email)) {
            $subject = 'Réinitialisation de votre mot de passe';
            $message = 'Bonjour, \n\ Voici le lien afin de réinitialiser votre mot de passe :';
            $headers = 'From: no-reply@tenraclovers.com' . "\r\n" . 'Reply-To: no-reply@tenraclovers.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();


            if (mail($email, $subject, $message, $headers)) {
                echo 'Un email de réinitialisation de mot de passe vous a été envoyé !';
            } else{
                echo "Echec de l'envoi de l'email. Veuillez réessayer ultérieurement.";
            }

        }
        else{
            echo "Aucun utilisateur n'utilise cette adresse. Veuillez réessayer.";
        }
    }
    else{
        (new ViewForgetPassword())->show(); // Affiche la vue ForgetPassword

    }

}
}