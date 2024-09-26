<?php

namespace controllers;

class ControllerPlat{
    public function execute(): void {
        $nom = isset($_GET['nom']) ? $_GET['nom'] : null;
        if ($nom) {
            $platVide = \models\ModelPlat::createEmpty();
            $plat = $platVide->getPlat($nom);
            if ($plat) {
                (new \views\ViewPlat())->show($plat);
            } else {
                echo 'Plat non trouvé.';
            }
        } else {
            echo 'Aucun nom de controllerPlat fourni.';
        }
    }

}