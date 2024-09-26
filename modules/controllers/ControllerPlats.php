<?php

namespace controllers;

class ControllerPlats
{
   public function execute(): void{
       $plats = (new \models\ModelPlats())->getPlats();
       (new \views\ViewPlats())->show($plats);
   }
}