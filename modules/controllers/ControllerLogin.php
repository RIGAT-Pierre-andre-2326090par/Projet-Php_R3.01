<?php

namespace controllers;

use models\ModelTenrac;
use views\ViewLogin;

class ControllerLogin {
    private $tenracModel;
    private $view;

    public function __construct() {
        $this->tenracModel = new ModelTenrac();
        $this->view = new ViewLogin();
    }

    public function execute(): void {
        // Si la méthode est POST (soumission du formulaire)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // Vérifie que tous les champs sont remplis
            if (empty($email) || empty($password)) {
                echo 'Veuillez renseigner tous les champs.<br>';
                return;
            }

            // Récupère l'utilisateur par email
            $tenrac = $this->tenracModel->getTenracByEmail($email);

            // Si l'utilisateur existe
            if ($tenrac) {
                // Vérifie le mot de passe avec password_verify
                if (password_verify($password, $tenrac['MDP_TR'])) {
                    // Authentification réussie
                    session_start();
                    $_SESSION['user'] = $tenrac['Nom_TR'];
                    $_SESSION['courriel'] = $tenrac['courriel'];
                    echo 'Vous êtes connecté !<br>';
                    header('Location: /index.php?action=tenrac');
                    exit(); // Assurez-vous de quitter après la redirection
                } else {
                    // Si le mot de passe est incorrect
                    echo 'Mot de passe incorrect !<br>';
                }
            } else {
                // Si l'utilisateur n'existe pas
                echo 'Adresse e-mail non trouvée.<br>';
            }
        }

        // Affiche la vue de connexion
        $this->view->show();
    }
}
