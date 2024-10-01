<?php

namespace controllers;

use views\ViewGestionPlat;

class ControllerGestionPlat
{
    /**
     * traite la requete de la page gestionPlat
     * @return void
     */
    public function execute() :void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton de modification du formulaire a été soumis
            if (isset($_POST['updateBouton'])) {
                $id = $_GET['id'];
                $nom = $_POST['nomPlat'];
                $desc = $_POST['descPlat'];
                (new \models\ModelGestionPlat())->updatePlat($id, $nom, $desc);
            }
            // Vérifie si le bouton de suppression a été soumis
            if (isset($_POST['deleteBouton'])) {
                $id = $_GET['id'];
                (new \models\ModelGestionPlat())->deletePlat($id);
            }
            else{
                (new \views\ViewGestionPlat())->show((new \models\ModelPlat())->getPlat($_GET['id']));
            }
        }
    }
}