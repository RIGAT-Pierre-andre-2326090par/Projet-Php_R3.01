<?php

namespace controllers;

class ControllerRecherche
{
    public function execute(): void{
        $keyword = $_GET["keyword"];
        $plats_searched = (new \models\ModelRecherche())->getPlats($keyword);
        (new \views\ViewRecherche())->show($keyword, $plats_searched);
    }
}