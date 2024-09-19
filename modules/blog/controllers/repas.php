<?php

namespace blog\controllers;

class repas
{
    public function execute(): void{
        (new \blog\views\repas())->show();
    }
}