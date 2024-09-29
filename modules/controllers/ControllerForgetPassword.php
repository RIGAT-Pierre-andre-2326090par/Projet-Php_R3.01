<?php

namespace controllers;

use models\ModelTenrac;
use views\ViewError;
use views\ViewForgetPassword;
use views\ViewPasswordResetConfirmation;

class ControllerForgetPassword
{
    public function execute(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"];

            // Validation du format de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                return;
            }

            // Recherche de l'utilisateur par e-mail
            $user = (new ModelTenrac())->getMail($email);

            // Message générique pour éviter de donner des informations sur l'existence de l'e-mail
            $subject = 'Réinitialisation de votre mot de passe';
            $message = "Bonjour,\n\nVoici le lien pour réinitialiser votre mot de passe : [lien ici]";
            $headers = 'From: no-reply@tenraclovers.com' . "\r\n" .
                'Reply-To: no-reply@tenraclovers.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            if ($user) {
                // Tentative d'envoi de l'e-mail
                if (mail($email, $subject, $message, $headers)) {
                    (new ViewPasswordResetConfirmation())->show();
                }
            } else {
                // Toujours afficher un message générique, même si l'utilisateur n'existe pas
                (new ViewPasswordResetConfirmation())->show();
            }
        } else {
            // Si pas de soumission de formulaire, affichage du formulaire
            (new ViewForgetPassword())->show();
        }
    }
}
