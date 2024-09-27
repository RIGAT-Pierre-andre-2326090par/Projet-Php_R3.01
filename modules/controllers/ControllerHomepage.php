<?php
namespace controllers;

use views\ViewHomepage;
use models\ModelPlats;
use models\ModelClubs;

class ControllerHomepage {
    public function execute(): void {
        $resplat = (new ModelPlats())->getPlats();
        $plats = $resplat['plats'];

        $resclub = (new ModelClubs())->getClubs();
        $clubs = $resclub['clubs'];
        (new ViewHomepage())->show($plats, $clubs);
    }
}