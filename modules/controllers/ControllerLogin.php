<?php

namespace controllers;
include '_assets/includes/autoloader.php';

use models\ModelTenrac;

class ControllerLogin
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email']; // On récupère l'adresse email du formulaire, sinon elle est NULL
            $password = $_POST['password'];
            if (empty($email) || empty($password)) { // Si l'adresse ou le mdp sont vides, il faut les remplir, réactualise la page.
                echo 'Veuillez renseigner tous les champs.';
                (new \views\ViewLogin())->show();
                return;
            }

            $model = new ModelTenrac();
            $user = $model->getMail($email); // On récupère l'email de notre Tenrac.

            if ($user && password_verify($password, $user['password'])) {
                header('location:index.php?action=accueil');

            } else {
                header('location:index.php?action=controllerLogin');
                echo 'Mot de passe incorrect !';
            }

        }
        (new \views\ViewLogin())->show();
    }
}


/*try{
    if (filter_input(INPUT_POST, 'action')) {
        if ($_POST['action'] === 'controllerSignIn') {
            $pdo = (new \includes\database())->getInstance();
            $sql = 'INSERT INTO CLIENT (NOM_CL, MDP_CL, ADR_CL, MAIL_CL, TEL_CL) VALUES 
                                                                 (:nom, :mdp, :adr, :mail, :tel)';
            $stmt = $pdo->prepare($sql); // Préparation d'une requête.
            //(new blog\controllers\controllerPlats())->execute();
        } elseif ($_POST['action'] === 'sign_up') {
            (new blog\controllers\controllerOrdre())->execute();
        } else{
            (new blog\controllers\viewHomepage())->execute();
        }
    }
    else (new blog\controllers\viewHomepage())->execute();
}
catch(Exception $e){
    (new \blog\views\viewError())->show($e->getMessage());
}*/