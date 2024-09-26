<?php

namespace controllers;

class ControllerRepas
{
    public function execute(): void{
        $repas = (new \models\ModelRepas())->getRepas();
        (new \views\ViewRepas())->show($repas);
    }
}