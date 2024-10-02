<?php

namespace controllers;

class ControllerGestionTenrac
{
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
                $nom = $_POST['nomTenrac'];
                $mdp = $_POST['mdpTenrac'];
                $adr = $_POST['adrTenrac'];
                $email = $_POST['courrielTenrac'];
                $telephone = $_POST['telephoneTenrac'];
                $grade = $_POST['gradeTenrac'];
                $rang = $_POST['rangTenrac'];
                $titre = $_POST['titreTenrac'];
                $dignite = $_POST['digniteTenrac'];
                (new \models\ModelTenrac())->updateTenrac($nom, $mdp, $email, $telephone, $adr, $grade, $rang, $titre, $dignite, $id);
                (new \views\ViewLayout('Tenrac modifié', '<h2>Tenrac Modifié</h2>'))->show();
            }
            if (isset($_POST['supprimerBouton'])) {
                $id = $_SESSION['user'];
                (new \models\ModelTenrac())->deleteTenrac($id);
                (new \views\ViewLayout('Votre compte à été supprimé', '<h2>Votre compte à été supprimé</h2>'))->show();
            }
        }
    }
}

