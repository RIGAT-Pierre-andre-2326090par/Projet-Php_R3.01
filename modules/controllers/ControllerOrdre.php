<?php

namespace controllers;


use models\ModelClubs;
use views\ViewOrdre;

class ControllerOrdre
{
    public function execute($page): void{
        $Clubs = new ModelClubs();
        $resultat = $Clubs->getClubs($page, 5);
        $clubs = $resultat['clubs'];
        $pagemax = $resultat['pagemax'];
        (new ViewOrdre())->show($clubs, $page, $pagemax);
    }
}