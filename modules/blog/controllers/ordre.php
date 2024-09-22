<?php

namespace blog\controllers;

use blog\models\Clubs;

class ordre
{
    public function execute(): void{
        $Clubs = new Clubs();
        $clubs = $Clubs->getClubs();
        (new \blog\views\ordre())->show($clubs);
    }
}