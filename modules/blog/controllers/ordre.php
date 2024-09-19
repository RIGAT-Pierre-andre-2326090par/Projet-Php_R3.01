<?php

namespace blog\controllers;

class ordre
{
    public function execute(): void{
        (new \blog\views\ordre())->show();
    }
}