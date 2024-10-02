<?php

namespace controllers;

use models\ModelClubs;
use models\ModelGestionRepas;
use models\ModelClub; // Assurez-vous d'importer votre modèle de club

class ControllerAjoutRepas
{
    /**
     * traite la requête de la page ajoutRepas
     * @return void
     * @throws \Exception
     */
    public function execute(): void
    {
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            // Redirige vers la page de connexion
            header('Location: /index.php?action=login');
            exit(); // Assurez-vous que le script s'arrête ici
        }

        // Récupérer les clubs pour le select
        $clubs = (new ModelClubs())->getAllClubs(); // Assurez-vous d'avoir une méthode pour obtenir tous les clubs

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton d'ajout a été soumis
            if (isset($_POST['ajoutBouton'])) {
                // Récupérer les données du formulaire
                $date = $_POST['dateRepas'];
                $club = $_POST['clubRepas'];

                // Créez le nom de l'image (si nécessaire)
                $img = strtolower(str_replace(' ', '_', $date)) . '.webp';

                // Appel de la méthode pour insérer le repas
                (new ModelGestionRepas())->insertRepas($date, $club, $img); // Ajoutez l'argument pour l'image si nécessaire

                // Rediriger vers la page appropriée après l'ajout
                header('Location: /index.php?action=repas'); // Redirection vers la page de gestion des repas
                exit();
            }
        }

        // Affichez le formulaire d'ajout de repas
        (new \views\ViewAjoutRepas())->show($clubs);
    }
}
