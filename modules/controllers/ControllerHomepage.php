<?php
namespace controllers;

use views\ViewHomepage;
use models\ModelPlats;
use models\ModelClubs;

class ControllerHomepage {
    public function execute(): void {
        $plats = (new ModelPlats())->getPlats();
        $clubs = (new ModelClubs())->getClubs();
        (new ViewHomepage())->show($plats, $clubs);
    }
}