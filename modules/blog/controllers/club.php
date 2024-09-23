<?php

namespace blog\controllers;

class club
{
    public function execute(){
        $newClub = (new \blog\models\Club())->getClub();
        (new \blog\views\plat())->show($newClub);
    }
}