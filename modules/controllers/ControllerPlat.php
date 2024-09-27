<?php

namespace controllers;
use views\ViewPlat;
use models\ModelPlat;

class ControllerPlat{
    public function execute(): void {
        $nom = ($_GET['nom']) ?? null; // Soit GET['nom'], soit NULL
        if ($nom) {
            $platVide = ModelPlat::createEmpty(); // On crée un modèle vide.
            $plat = $platVide->getPlat($nom);
            if ($plat) {
                (new ViewPlat())->show($plat); // Affiche la vue Plat, avec le plat en détail.
            } else {
                echo 'Plat non trouvé.';
            }
        } else {
            echo 'Aucun nom de controllerPlat fourni.';
        }
    }

}