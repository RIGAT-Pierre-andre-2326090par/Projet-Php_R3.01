<?php

namespace blog\controllers;

use blog\models\Tenrac;

class sign_in
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nom = $_POST['Nom'] ?? null;
            $Mot_de_Passe = $_POST['Mot de Passe'] ?? null;
            $Adresse = $_POST['Adresse'] ?? null;
            $Email = $_POST['Email'] ?? null;
            $Telephone = $_POST['Téléphone'] ?? null;
            if (empty($Nom) || empty($Mot_de_Passe) || empty($Adresse) || empty($Email) || empty($Telephone)) {
                echo 'Veuillez renseigner tous les champs.';
                (new \blog\views\sign_in())->show();
                return;
            }

            $model = new Tenrac();
            $user = $model->getMail($Email);

            if ($user && password_verify($Mot_de_Passe, $user['password'])) {
                header('location:index.php?action=accueil');

            } else {
                header('location:index.php?action=sign_in');
                echo 'Mot de passe incorrect !';
            }

        }
        (new \blog\views\sign_in())->show();
    }
}
