<?php

namespace blog\models;

class Club
{
    public function __construct(private $nom_cl, private $adresse_cl, private $img_cl){}

    public function show()
    {
        echo "Club: $this->nom_cl, Address: $this->adresse_cl, Image: $this->img_cl";
    }

    public function getName()
    {
        return $this->nom_cl;
    }

    public function getAddress()
    {
        return $this->adresse_cl;
    }

    public function getImage()
    {
        return $this->img_cl;
    }
}