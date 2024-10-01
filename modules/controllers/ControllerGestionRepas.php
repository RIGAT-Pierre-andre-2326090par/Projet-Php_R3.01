<?php

namespace controllers;

class ControllerGestionRepas
{
    /**
     * traite la requete de la page gestionRepas
     * @return void
     * @throws \Exception
     */
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton de modification a été soumis
            if (isset($_POST['modifBouton'])) {
                $id = $_GET['id'];
                $date = $_POST['dateRepas'];
                $club = $_POST['clubRepas'];
                (new \models\ModelGestionRepas())->updateRepas($date, $id, $club);
            }
            if (isset($_POST['deleteBouton'])) {
                $id = $_GET['id'];
                (new \models\ModelGestionRepas())->deleteRepas($id);
            }
            else{
                (new \views\ViewGestionRepas())->show((new \models\ModelUnRepas())->getRepas( $_GET['id']));
            }
        }

    }
}
