<?php

namespace controllers;

class ControllerTenrac {
    /**
     * Traite la requête de la page Tenrac
     * @param $id: l'id du Tenrac
     * @return void
     */
    public function execute($id): void {
        // Démarrer la session si ce n'est pas déjà fait
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            header('Location: /index.php?action=login');
            exit();
        }

        // Utilisateur connecté, récupérer les données de l'utilisateur
        $user = (new \models\ModelTenrac())->getTenrac($id);
        (new \views\ViewTenrac())->show($user);
    }
}