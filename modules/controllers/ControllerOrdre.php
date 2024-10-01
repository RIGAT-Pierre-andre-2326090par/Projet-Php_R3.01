<?php

namespace controllers;


use models\ModelClubs;
use views\ViewOrdre;

class ControllerOrdre
{
    /**
     * traite la requete de la page ordre
     * @param $page: le numéro de la page chargé
     * @return void
     */
    public function execute($page): void{
        $Clubs = new ModelClubs();
        $resultat = $Clubs->getClubs($page, 5);
        $clubs = $resultat['clubs'];
        $pagemax = $resultat['pagemax'];
        (new ViewOrdre())->show($clubs, $page, $pagemax);
    }
}