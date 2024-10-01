<?php

namespace controllers;
use views\ViewPlat;
use models\ModelPlat;

class ControllerPlat{
    /**
     * Traite la requête de la page Plat
     * @return void
     */
    public function execute(): void {
        $id = ($_GET['id']) ?? null; // Soit GET['id'], soit NULL
        if ($id) {
            $platVide = ModelPlat::createEmpty(); // On crée un modèle vide.
            $plat = $platVide->getPlat($id);
            if ($plat) {
                $ingredients = (new \models\ModelIngredients())->getIngredients($id); // On récupère les ingrédients du plat.
                (new ViewPlat())->show($plat,$ingredients); // Affiche la vue Plat, avec le plat en détail.
            } else {
                echo 'Plat non trouvé.';
            }
        } else {
            echo 'Aucun nom de controllerPlat fourni.';
        }
    }

}