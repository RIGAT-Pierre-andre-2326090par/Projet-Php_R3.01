<?php

namespace controllers;

use Exception;
use models\ModelGestionPlat;
use views\ViewAjoutPlat;

class ControllerAjoutPlat
{
    /**
     * Traite la requête de la page AjoutPlat
     * @return void
     * @throws Exception
     */
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton d'ajout a été soumis
            if (isset($_POST['ajoutBouton'])) {
                $nom = $_POST['nomPlat'];
                $desc = $_POST['descPlat'];
                $img = $_POST['imgPlat'];
                (new ModelGestionPlat())->insertPlat($nom, $desc, $img);
            }
        }
        (new ViewAjoutPlat())->show(); // Montre la vue d'AjoutPlat
    }
}