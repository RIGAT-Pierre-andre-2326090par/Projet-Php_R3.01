<?php

namespace blog\controllers;
//include '_assets/includes/autoloader.php';

use blog\models\Tenrac;

class login
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null; // On récupère l'adresse email du formulaire, sinon elle est NULL
            $password = $_POST['password'] ?? null;
            if (empty($email) || empty($password)) { // Si l'adresse ou le mdp sont vides, il faut les remplir, réactualise la page.
                echo 'Veuillez renseigner tous les champs.';
                (new \blog\views\login())->show();
                return;
            }

            $model = new Tenrac();
            $user = $model->getMail($email); // On récupère l'email de notre Tenrac.

            if ($user && password_verify($password, $user['password'])) {
                header('location:index.php?action=accueil');

            } else {
                header('location:index.php?action=login');
                echo 'Mot de passe incorrect !';
            }

        }
        (new \blog\views\login())->show();
    }
}


/*try{
    if (filter_input(INPUT_POST, 'action')) {
        if ($_POST['action'] === 'sign_in') {
            $pdo = (new \includes\database())->getInstance();
            $sql = 'INSERT INTO CLIENT (NOM_CL, MDP_CL, ADR_CL, MAIL_CL, TEL_CL) VALUES 
                                                                 (:nom, :mdp, :adr, :mail, :tel)';
            $stmt = $pdo->prepare($sql); // Préparation d'une requête.
            //(new blog\controllers\plats())->execute();
        } elseif ($_POST['action'] === 'sign_up') {
            (new blog\controllers\ordre())->execute();
        } else{
            (new blog\controllers\homepage())->execute();
        }
    }
    else (new blog\controllers\homepage())->execute();
}
catch(Exception $e){
    (new \blog\views\error())->show($e->getMessage());
}*/