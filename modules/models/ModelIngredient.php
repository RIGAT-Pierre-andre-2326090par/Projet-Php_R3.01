<?php

namespace models;

class ModelIngredient
{
    /**
     * le constructeur de la classe ModelIngredient
     * @param $nom_ig: le nom de l'ingrédient
     * @param $legume_ig: le type de l'ingrédient
     * @param $img_ig: le chemin de l'image de l'ingrédient
     */
    public function __construct(private $nom_ig, private $legume_ig, private $img_ig){}


}