<?php

namespace blog\models;

class Club
{
    public function __construct(private $id_cl, private $nom_cl, private $adresse_cl, private $img_cl){}

    public function show()
    {

    }
}