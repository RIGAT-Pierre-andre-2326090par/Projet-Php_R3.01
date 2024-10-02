<?php

namespace controllers;

class ControllerGestionTenrac
{
    /**
     * Traite la gestion des Tenracs.
     * @return void
     */
    public function execute()
    {
        if (!isset($_SESSION['user'])) {
            // Redirige vers la page de connexion
            header('Location: /index.php?action=login');
            exit(); // Assurez-vous que le script s'arrête ici
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton de modification a été soumis
            if (isset($_POST['modifBouton'])) {
                $id = $_SESSION['user'];
                $Nom = $_POST['nomTenrac'];
                $password = $_POST['mdpTenrac'];
                $adr = $_POST['adrTenrac'];
                $email = $_POST['courrielTenrac'];
                $telephone = $_POST['telephoneTenrac'];
                $grade = $_POST['gradeTenrac'];
                $rang = $_POST['rangTenrac'];
                $titre = $_POST['titreTenrac'];
                $dignite = $_POST['digniteTenrac'];
                $subject = 'Code Tenracs-Lovers';
                $message = "Bonjour, votre mot de passe a été modifié, voici vos nouveaux identifiants pour tenrac lovers : \n - email :".$email."\n - mot de passe :".$password."\n Cordialement, \n L'ordre des tenracs";
                $headers = 'From: no-reply@tenraclovers.com' . "\r\n" .
                    'Reply-To: no-reply@tenraclovers.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                if (mail($email, $subject, $message, $headers)) {
                    (new \models\ModelTenrac())->updateTenrac($Nom,$password,$email,$telephone,$adr,$grade,$rang,$titre,$dignite,$id);
                    (new \views\ViewLayout('User mis à jour', '<h2>User mis à jour </h2>'))->show();
                } else {
                    (new \views\ViewLayout('User non mis à jour', '<h2>Erreur lors de l\'envoie des codes (user non crée)</h2>'))->show();
                }
            }
            if (isset($_POST['supprimerBouton'])) {
                $id = $_SESSION['user'];
                (new \models\ModelTenrac())->deleteTenrac($id);
                (new \views\ViewLayout('Votre compte à été supprimé', '<h2>Votre compte à été supprimé</h2>'))->show();
            }
        }
    }
}

