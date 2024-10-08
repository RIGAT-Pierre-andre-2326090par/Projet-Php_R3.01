<?php


namespace controllers;

class ControllerUnRepas
{
    /**
     * Traite la requête de la page d'un repas
     * @return void
     */
    public function execute(): void
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $repasVide = \models\ModelUnRepas::createEmpty();
            $repas = $repasVide->getRepas($id);

            $plats = (new \models\ModelUnRepas())->getPlats($id);

            if ($repas) {
                (new \views\ViewUnRepas())->show($repas, $plats);
            } else {
                echo 'Repas non trouvé.';
            }
        } else {
            echo 'Aucun id de Repas fourni.';
        }
    }

}