<?php


namespace controllers;

class ControllerUnRepas
{
    public function execute(): void
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $repasVide = \models\ModelUnRepas::createEmpty();
            $repas = $repasVide->getRepas($id);
            if ($repas) {
                (new \views\ViewUnRepas())->show($repas);
            } else {
                echo 'ModelRepas non trouvé.';
            }
        } else {
            echo 'Aucun id de controllerRepas fourni.';
        }
    }

}