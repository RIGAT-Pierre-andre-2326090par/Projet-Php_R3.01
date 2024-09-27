<?php

namespace controllers;

use models\ModelTenrac;
use views\ViewLogin;

class ControllerLogin {
    private $tenracModel;
    private $view;


    public function __construct(ModelTenrac $tenracModel, ViewLogin $view) {
        $this->tenracModel = $tenracModel;
        $this->view = $view;
    }

    public function execute(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                echo 'Veuillez renseigner tous les champs.<br>';
                return;
            }
            $tenrac = $this->tenracModel->getMail($email);



            // Vérifie si le mot de passe est correct
                if ($tenrac && $this->tenracModel->validatePassword($password, $tenrac['MDP_TR'])) {
                // Authentification réussie
                session_start();
                $_SESSION['user'] = $tenrac; // Stocke l'utilisateur en session
                echo 'Vous êtes connecté !<br>';
                header('Location: /index.php?action=accueil');
                exit();
            } else {
                // Authentification échouée
                echo 'Mot de passe ou adresse e-mail incorrect !<br>';
                echo 'Mot de passe (haché) récupéré: ' . $tenrac['MDP_TR'] . "<br>";
                echo "Email: " . htmlspecialchars($email) . "<br>";
                echo "Mot de passe (avant hashage): " . htmlspecialchars($password) . "<br>";
            }
        }

        (new ViewLogin())->show(); // Affiche la vue de connexion
    }
}
