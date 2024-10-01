<?php
namespace controllers;
class ControllerAjoutRepas
{
    /**
     * traite la requete de la page ajoutRepas
     * @return void
     * @throws \Exception
     */
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton d'ajout a été soumis
            if (isset($_POST['ajoutBouton'])) {
                $date = $_POST['dateRepas'];
                $club = $_POST['clubRepas'];
                $img = strtolower(str_replace(' ', '_', $_POST['dateRepas'])) . '.webp';
                (new \models\ModelGestionRepas())->insertRepas($date, $club);
            }
        }
        (new \views\ViewAjoutRepas())->show();
    }
}
