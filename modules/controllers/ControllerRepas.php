<?php

namespace controllers;

class ControllerRepas
{
    public function execute($page): void{
        $repas = (new \models\ModelRepas())->getRepas($page);
        (new \views\ViewRepas())->show($repas, $page);
    }
}