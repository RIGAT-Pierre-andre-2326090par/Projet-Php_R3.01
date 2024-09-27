<?php

namespace controllers;

class ControllerPlats
{
   public function execute($page): void{
       $resultat = (new \models\ModelPlats())->getPlats($page, 5);
       $plats = $resultat['plats'];
       $pagemax = $resultat['pagemax'];

       (new \views\ViewPlats())->show($plats, $page, $pagemax);
   }
}