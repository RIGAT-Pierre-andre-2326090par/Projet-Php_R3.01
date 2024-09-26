<?php
namespace controllers;

use views\ViewHomepage;

class ControllerHomepage {
    public function execute(): void {
        $plats = (new \models\ModelPlats())->getPlats();
        $clubs = (new \models\ModelClubs())->getClubs();
        (new ViewHomepage())->show($plats, $clubs);
    }
}