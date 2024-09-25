<?php

namespace blog\controllers;

use PDO;
use PDOException;

class plat{
    public function execute(): void {
        $nom = isset($_GET['nom']) ? $_GET['nom'] : null;
        if ($nom) {
            $platVide = \blog\models\plat::createEmpty();
            $plat = $platVide->getPlat($nom);
            if ($plat) {
                (new \blog\views\plat())->show($plat);
            } else {
                echo 'Plat non trouvé.';
            }
        } else {
            echo 'Aucun nom de plat fourni.';
        }
    }

}