<?php

namespace controllers;

class ControllerGestionClub
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton de modification a été soumis
            if (isset($_POST['modifBouton'])) {
                $id = $_GET['id'];
                $nom = $_POST['nomClub'];
                $adr = $_POST['adrClub'];
                $desc = $_POST['descClub'];
                (new \models\ModelGestionClub())->updateClub($id, $nom, $adr, $desc);
            }

            // Vérifie si le bouton de suppression a été soumis
            if (isset($_POST['deleteBouton'])) {
                (new \models\ModelGestionClub())->deleteClub();
            }
        }
        (new \views\ViewGestionClub())->show((new \models\ModelClub())->getClub( $_GET['id']));
    }
}
