<?php

namespace controllers;

class ControllerSignIn
{
    /**
     * Traite la requête de la page d'inscription
     * @return void
     */
    public function execute(): void
    {
        if (!isset($_SESSION['user'])) {
            // Redirige vers la page de connexion
            header('Location: /index.php?action=login');
            exit(); // Assurez-vous que le script s'arrête ici
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nom = $_POST['Nom'];
            $password= $_POST['Mot_de_Passe'];
            $Mot_de_Passe = password_hash($password, PASSWORD_DEFAULT);
            $Adresse = $_POST['Adresse'];
            $email = $_POST['Email'];
            $Telephone = $_POST['Téléphone'];
            $grade = !empty($_POST['grade']) ? $_POST['grade'] : 'Affilié';
            $rang = !empty($_POST['rang']) ? $_POST['rang'] : null;
            $titre = !empty($_POST['titre']) ? $_POST['titre'] : null;
            $dignite = !empty($_POST['dignite']) ? $_POST['dignite'] : null;
            $club = !empty($_POST['club']) ? $_POST['club'] : null;
            $subject = 'Code Tenracs-Lovers';
            $message = "Bonjour voici vos identifiants pour tenrac lovers : \n - email :".$email."\n - mot de passe :".$password."\n Cordialement, \n L'ordre des tenracs";
            $headers = 'From: no-reply@tenraclovers.com' . "\r\n" .
                            'Reply-To: no-reply@tenraclovers.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
            if (mail($email, $subject, $message, $headers)) {
                (new \models\ModelSignIn())->addUser($Nom, $Mot_de_Passe, $Adresse, $email, $Telephone, $grade, $rang, $titre, $dignite, $club);
                (new \views\ViewLayout('User Crée', '<h2>User crée</h2>'))->show();
            } else {
                (new \views\ViewLayout('User Non Crée', '<h2>Erreur lors de l\'envoie des codes (user non crée)</h2>'))->show();
            }
        }
        else {
            $clubs = (new \models\ModelClubs())->getAllClubs();
            (new \views\ViewSignIn())->show($clubs);
        }


    }
}
