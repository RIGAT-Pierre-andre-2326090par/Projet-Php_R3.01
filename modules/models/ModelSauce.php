<?php

namespace models;

class ModelSauce
{
    private $nom_sc;
    private $img_sc;

    /**
     * le constructeur de la classe ModelSauce
     * @param $nom_sc: nom de la sauce
     * @param $img_sc: image de la sauce
     */
    public function __construct($nom_sc, $img_sc){
        $this->nom_sc = $nom_sc;
        $this->img_sc = $img_sc;

    }


}