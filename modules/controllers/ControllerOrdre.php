<?php

namespace controllers;


use models\ModelClubs;
use views\ViewOrdre;

class ControllerOrdre
{
    public function execute(): void{
        $Clubs = new ModelClubs();
        $clubs = $Clubs->getClubs();
        (new ViewOrdre())->show($clubs);
    }
}