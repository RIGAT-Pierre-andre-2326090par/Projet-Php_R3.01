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
            $Mot_de_Passe = password_hash($_POST['Mot_de_Passe'], PASSWORD_DEFAULT);
            $Adresse = $_POST['Adresse'];
            $Email = $_POST['Email'];
            $Telephone = $_POST['Téléphone'];
            $grade = !empty($_POST['grade']) ? $_POST['grade'] : 'Affilié';
            $rang = !empty($_POST['rang']) ? $_POST['rang'] : null;
            $titre = !empty($_POST['titre']) ? $_POST['titre'] : null;
            $dignite = !empty($_POST['dignite']) ? $_POST['dignite'] : null;
            (new \models\ModelSignIn())->addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone, $grade, $rang, $titre, $dignite);
            (new \views\ViewLayout('User Crée', '<h2>User crée</h2>'))->show();
        }
        else {
            (new \views\ViewSignIn())->show();
        }


    }
}
