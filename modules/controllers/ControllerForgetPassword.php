<?php

namespace controllers;

use models\ModelTenrac;
use views\ViewForgetPassword;
use views\ViewPasswordResetConfirmation;

class ControllerForgetPassword
{
    /**
     * Traite la requête de la page de réinitialisation de mot de passe
     * @return void
     */
    public function execute(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

            if ($email) {
                $model = new ModelTenrac(); // Assurez-vous d'instancier votre modèle
                $user = $model->findUserByEmail($email); // Vous devez créer cette méthode dans votre modèle

                if ($user) {
                    $subject = 'Réinitialisation de votre mot de passe';
                    $message = "Bonjour,\n\nVoici le lien pour réinitialiser votre mot de passe : [lien ici]";
                    $headers = 'From: no-reply@tenraclovers.com' . "\r\n" .
                        'Reply-To: no-reply@tenraclovers.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    // Tentative d'envoi de l'e-mail
                    if (mail($email, $subject, $message, $headers)) {
                        // Rediriger vers la page de confirmation après l'envoi
                        header('Location: /index.php?action=confirmReset&status=success');
                        exit();
                    } else {
                        // Afficher un message d'erreur si l'envoi échoue
                        header('Location: /index.php?action=confirmReset&status=failure');
                        exit();
                    }
                } else {
                    // Toujours afficher un message générique
                    header('Location: /index.php?action=confirmReset&status=failure');
                    exit();
                }
            } else {
                // Si pas de soumission de formulaire, affichage du formulaire
                (new ViewForgetPassword())->show();
            }
        } else {
            // Si pas de soumission de formulaire, affichage du formulaire
            (new ViewForgetPassword())->show();
        }
    }
}
