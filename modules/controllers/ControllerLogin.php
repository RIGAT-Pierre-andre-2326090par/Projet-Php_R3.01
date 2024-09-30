<?php

namespace controllers;

class ControllerLogin {

    public function __construct() {
    }

    public function execute(): void {
        $model=(new \models\ModelLogin());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $model->login($email, $password);
        }
        if($model->getNb()==1 || $model->getNb()==2){
            (new \views\ViewLayout('Erreur',$model->getMessageError()))->show();
        }
        else{
            (new \views\ViewLogin())->show();
        }


    }
    public function logout(): void {
        // Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Détruire toutes les variables de session
        session_unset();

        // Détruire la session
        session_destroy();

        // Rediriger vers la page d'accueil (ou une autre page)
        header("Location: /index.php?action=accueil");
        exit();
    }

}

