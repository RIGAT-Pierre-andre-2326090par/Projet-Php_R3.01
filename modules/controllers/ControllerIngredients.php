<?php

namespace controllers;

use models\ModelIngredients;
use views\ViewIngredients;

class ControllerIngredients
{
    /**
     * traite la requete de la page ordre
     * @param $page: le numéro de la page chargé
     * @return void
     */
    public function execute($page): void{
        $Ingredients = new ModelIngredients();
        $resultat = $Ingredients->getIngredients($page, 5);
        $ingredients = $resultat['ingredients'];
        $pagemax = $resultat['pagemax'];
        (new ViewIngredients())->show($ingredients, $page, $pagemax);
    }
}