<?php
namespace blog\controllers;

use PDO;
use PDOException;

class homepage {
    public function execute(): void {
        $plats = (new \blog\models\Plats())->getPlats();
        $clubs = (new \blog\models\Clubs())->getClubs();
        (new \blog\views\homepage())->show($plats, $clubs);
    }
}