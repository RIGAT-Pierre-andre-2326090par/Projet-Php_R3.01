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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            if (empty($email) || empty($password)) {
                echo 'Veuillez renseigner tous les champs.<br>';
                return;
            }

            $tenrac = $this->tenracModel->getTenracId($email, $password_hash);



            // Vérifie si le mot de passe est correct
            if ($tenrac !== -1) {
                // Authentification réussie
                session_start();
                $_SESSION['user'] = $tenrac; // Stocke l'utilisateur en session
                echo 'Vous êtes connecté !<br>';
                header('Location: /index.php?action=tenrac');
            } else {
                // Authentification échouée
                echo 'Mot de passe ou adresse e-mail incorrect !<br>';
                echo 'Mot de passe (haché) récupéré: ' . $password_hash . "<br>";
                echo "Email: " . htmlspecialchars($email) . "<br>";
                echo "Mot de passe (avant hashage): " . htmlspecialchars($password) . "<br>";
            }
        }

        (new ViewLogin())->show(); // Affiche la vue de connexion
    }
}
