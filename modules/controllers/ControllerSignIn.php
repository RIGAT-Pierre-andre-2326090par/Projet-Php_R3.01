<?php

namespace controllers;

class ControllerSignIn
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nom = $_POST['Nom'];
            $Mot_de_Passe = $_POST['Mot_de_Passe'];
            $Adresse = $_POST['Adresse'];
            $Email = $_POST['Email'];
            $Telephone = $_POST['Téléphone'];
            (new \models\ModelSignIn())->addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone);
            header('location:index.php?action=controllerLogin');
        }
        (new \views\ViewSignIn())->show();
    }
}
