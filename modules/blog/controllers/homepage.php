<?php
namespace blog\controllers;

use PDO;
use PDOException;

class homepage {
    public function execute(): void {
        $plats = (new \blog\models\plats())->getPlats();
        $clubs = (new \blog\models\clubs())->getClubs();
        (new \blog\views\homepage())->show($plats, $clubs);
    }
}