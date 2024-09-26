<?php


namespace blog\controllers;

use PDO;
use PDOException;

class unrepas
{
    public function execute(): void
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $repasVide = \blog\models\unrepas::createEmpty();
            $repas = $repasVide->getRepas($id);
            if ($repas) {
                (new \blog\views\unrepas())->show($repas);
            } else {
                echo 'Repas non trouvé.';
            }
        } else {
            echo 'Aucun id de repas fourni.';
        }
    }

}