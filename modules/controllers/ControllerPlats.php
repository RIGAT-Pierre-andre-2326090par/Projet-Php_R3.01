<?php

namespace controllers;

class ControllerPlats
{
    /**
     * traite la requete de la page plats
     * @param $page: le numéro de la page chargé
     * @return void
     */
    public function execute($page): void{
       $resultat = (new \models\ModelPlats())->getPlats($page, 5);
       $plats = $resultat['plats'];
       $pagemax = $resultat['pagemax'];

       (new \views\ViewPlats())->show($plats, $page, $pagemax);
   }
}