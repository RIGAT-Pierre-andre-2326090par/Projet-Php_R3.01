<?php

namespace controllers;

use JetBrains\PhpStorm\NoReturn;
use models\ModelLogin;
use views\ViewLogin;

class ControllerLogin {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelLogin(); // Instanciation du modèle
        $this->view = new ViewLogin(); // Instanciation de la vue
    }

    public function execute(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->connecter($_POST);
        } else {
            $this->afficherPage();
        }
    }

    public function afficherPage(): void {
        // Affiche la vue de connexion
        $this->view->show();
    }

    #[NoReturn] public function connecter(array $post): void {
        $courriel = htmlspecialchars($post["email"]);
        $password = htmlspecialchars($post["password"]);


        // Appeler la méthode login du modèle
        if ($this->model->login($courriel, $password)) {
            header("Location: /home"); // Redirige vers la page d'accueil après la connexion
        } else {
            echo "Mail ou mot de passe incorrect";
        }
        exit();

    }

    public function deconnecter(): void {
        $this->model->logout(); // Appeler la méthode logout du modèle
    }
}

