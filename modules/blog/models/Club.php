<?php

namespace blog\models;

class Club
{
    public function __construct(private $id_cl, private $nom_cl, private $adresse_cl, private $img_cl){}

    public function show()
    {

    }

    public function getId()
    {
        return $this->id_cl;
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