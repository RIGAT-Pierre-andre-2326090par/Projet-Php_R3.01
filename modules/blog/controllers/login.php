<?php

namespace blog\controllers;
include '_assets/includes/autoloader.php';

try{
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
}