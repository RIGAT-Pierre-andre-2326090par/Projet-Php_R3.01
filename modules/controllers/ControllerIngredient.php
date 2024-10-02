<?php

namespace controllers;

use models\ModelIngredient;
use views\ViewIngredient;

class ControllerIngredient
{
    /**
     * traite la requete de la page ingredient
     * @return void
     */
    public function execute(): void {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $ingredientVide = ModelIngredient::createEmpty();
            $ingredient = $ingredientVide->getIngredient($id);
            if ($ingredient) {
                (new ViewIngredient())->show($ingredient);
            } else {
                echo 'Ingredient non trouvé.';
            }

        }
        else {
            echo 'Aucun nom d\'ingredient fourni.';
        }


    }
}