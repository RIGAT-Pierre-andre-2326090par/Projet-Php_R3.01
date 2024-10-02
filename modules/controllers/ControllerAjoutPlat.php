<?php

namespace controllers;

class ControllerAjoutPlat
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton d'ajout a été soumis
            if (isset($_POST['ajoutBouton'])) {
                $nom = $_POST['nomPlat'];
                $desc = $_POST['descPlat'];
                $img = $_POST['imgPlat'];
                (new \models\ModelGestionPlat())->insertPlat($nom, $desc, $img);
            }
        }
        (new \views\ViewAjoutPlat())->show();
    }
}