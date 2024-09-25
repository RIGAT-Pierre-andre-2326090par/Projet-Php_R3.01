<?php

namespace blog\models;

class Sauce
{
    private $nom_sc;
    private $img_sc;
    public function __construct($nom_sc, $img_sc){
        $this->nom_sc = $nom_sc;
        $this->img_sc = $img_sc;

    }


}