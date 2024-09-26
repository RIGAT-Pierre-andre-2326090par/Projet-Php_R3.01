<?php

namespace blog\controllers;

class ControllerRecherche
{
    public function execute(): void{
        $keyword = $_GET["keyword"];
        $plats_searched = (new \blog\models\ModelRecherche())->getPlats($keyword);
        (new \blog\views\recherche())->show($plats_searched);
    }
}