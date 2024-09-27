<?php
namespace controllers;

use views\ViewHomepage;
use models\ModelPlats;
use models\ModelClubs;

class ControllerHomepage {
    public function execute(): void {
        $resplat = (new ModelPlats())->getPlats(); // Récupère les plats à partir du modèle
        $plats = $resplat['plats'];

        $resclub = (new ModelClubs())->getClubs(); // Récupère les clubs à partir du modèle
        $clubs = $resclub['clubs'];
        (new ViewHomepage())->show($plats, $clubs); // Affiche la vue Homepage
    }
}