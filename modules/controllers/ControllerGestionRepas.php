<?php

namespace controllers;

use Exception;
use models\ModelClubs;
use models\ModelGestionRepas;
use models\ModelUnRepas;
use views\ViewGestionRepas;

class ControllerGestionRepas
{
    /**
     * Traite la requête de la page gestionRepas.
     * @return void
     * @throws Exception
     */
    public function execute(): void
    {
        // Vérifie si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            // Redirige vers la page de connexion
            header('Location: /index.php?action=login');
            exit(); // Arrête le script après redirection
        }

        // Si la méthode de requête est POST, c'est une soumission de formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['id'];

            // Vérifie si le bouton de modification a été soumis
            if (isset($_POST['modifBouton'])) {
                $date = $_POST['dateRepas'];
                $club = $_POST['clubRepas'];


                // Met à jour le repas
                (new ModelGestionRepas())->updateRepas($date, $id, $club);

                // Redirige après la modification pour éviter de re-soumettre le formulaire
                header("Location: /index.php?action=repas");
                exit();
            }

            // Vérifie si le bouton de suppression a été soumis
            if (isset($_POST['deleteBouton'])) {
                (new ModelGestionRepas())->deleteRepas($id);

                // Redirection après suppression
                header('Location: /index.php?action=repas');
                exit();
            }
        }


        // Récupère les informations du repas et tous les clubs
        $repas = (new ModelUnRepas())->getRepas($id);
        $clubs = (new ModelClubs())->getAllClubs();

        // Affiche la vue avec les informations du repas et la liste des clubs
        (new ViewGestionRepas())->show($repas, $clubs);
    }
}
