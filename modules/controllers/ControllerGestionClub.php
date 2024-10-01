<?php

namespace controllers;

class ControllerGestionClub
{
    /**
     * traite la requete de la page gestionClub
     * @return void
     */
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
            if (isset($_POST['deleteBouton'])) {
                $id = $_GET['id'];
                (new \models\ModelGestionClub())->deleteClub($id);
            }
            else{
                (new \views\ViewGestionClub())->show((new \models\ModelClub())->getClub( $_GET['id']));
            }
        }

    }
}
