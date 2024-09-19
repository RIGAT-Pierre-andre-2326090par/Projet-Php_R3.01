<?php

namespace blog\controllers;

class plats
{
   public function execute(): void{
       (new \blog\views\plats())->show();
   }
}