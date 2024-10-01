<?php

namespace controllers;

class ControllerRecherche
{
    /**
     * traite la requete de la page recherche
     * @return void
     * @throws \Exception
     */
    public function execute(): void{
        $keyword = $_GET["keyword"];
        $plats_searched = (new \models\ModelRecherche())->getPlats($keyword);
        (new \views\ViewRecherche())->show($keyword, $plats_searched);
    }
}