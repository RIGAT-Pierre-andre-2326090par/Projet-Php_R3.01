<?php

namespace blog\controllers;

use blog\models\Tenrac;

class sign_in
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nom = $_POST['Nom'];
            $Mot_de_Passe = $_POST['Mot de Passe'];
            $Adresse = $_POST['Adresse'];
            $Email = $_POST['Email'];
            $Telephone = $_POST['Téléphone'];
            (new \blog\models\sign_in())->addUser($Nom, $Mot_de_Passe, $Adresse, $Email ,$Telephone);
            (new \blog\controllers\login());

        }
        (new \blog\views\sign_in())->show();
    }
}
