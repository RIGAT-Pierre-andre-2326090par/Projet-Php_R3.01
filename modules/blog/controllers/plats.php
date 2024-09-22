<?php

namespace blog\controllers;

class plats
{
   public function execute(): void{
       $plats = (new \blog\models\Plats())->getPlats();
       (new \blog\views\plats())->show($plats);
   }
}