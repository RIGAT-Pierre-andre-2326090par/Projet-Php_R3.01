<?php

namespace blog\controllers;

class repas
{
    public function execute(): void{
        $repas = (new \blog\models\Repas())->getRepas();
        (new \blog\views\repas())->show($repas);
    }
}