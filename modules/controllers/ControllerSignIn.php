<?php

namespace controllers;

class ControllerSignIn
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nom = $_POST['Nom'];
            $Mot_de_Passe = password_hash($_POST['Mot_de_Passe'], PASSWORD_DEFAULT);
            $Adresse = $_POST['Adresse'];
            $Email = $_POST['Email'];
            $Telephone = $_POST['Téléphone'];
            $id = (new \models\ModelSignIn())->addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone);
            $_SESSION['user'] = $id;
            header('location:index.php?action=tenrac');
        }
        (new \views\ViewSignIn())->show();
    }
}
