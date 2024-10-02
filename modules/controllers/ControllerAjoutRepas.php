<?php

namespace controllers;

use models\ModelGestionRepas;
use models\ModelClubs;
use models\ModelPlats;
use Exception;

class ControllerAjoutRepas
{
    private $modelGestionRepas;

    /**
     * Le constructeur de la classe ControllerAjoutRepas
     */
    public function __construct()
    {
        $this->modelGestionRepas = new ModelGestionRepas();
    }

    /**
     * Exécute le contrôleur pour gérer l'ajout de repas
     * @return void
     */
    public function execute(): void
    {
        // Vérifie si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            // Redirige vers la page de connexion
            header('Location: /index.php?action=login');
            exit();
        }

        // Récupère les clubs et plats pour le select
        $clubs = (new ModelClubs())->getAllClubs();
        $plats = (new ModelPlats())->getAllPlats();

        // Gère l'ajout d'un nouveau repas
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton d'ajout a été soumis
            if (isset($_POST['ajoutBouton'])) {
                // Récupère les données du formulaire
                $date = $_POST['dateRepas'] ?? null;
                $club = $_POST['clubRepas'] ?? null;
                $platsChoisis = $_POST['plats'] ?? [];

                try {
                    // Insère le repas et récupère son ID
                    $idRepas = $this->modelGestionRepas->insertRepas($date, $club);

                    // Insère les plats dans le repas
                    $this->modelGestionRepas->insertCompose($idRepas, $platsChoisis);

                    // Redirection après insertion
                    header('Location: /index.php?action=repas');
                    exit();
                } catch (Exception $e) {
                    // Gérer les exceptions et afficher un message d'erreur
                    $errorMessage = $e->getMessage();
                }
            }
        }

        // Affiche la vue d'ajout de repas
        (new \views\ViewAjoutRepas())->show($clubs, $plats, $errorMessage ?? null);
    }
}
