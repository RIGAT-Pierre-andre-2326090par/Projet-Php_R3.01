<?php

namespace blog\controllers;

use PDO;
use PDOException;

class plat{
    public function execute():void{
        $newPlat = (new \blog\models\plat())->getPlat();
        (new \blog\views\plat())->show($newPlat);
    }

}