<?php

namespace blog\models;

class Plats
{
    public function __construct(private $nom_pl, private $img_pl){}

    public function show(): void
    {
        echo "<hr><br>$this->nom_pl<br>
            <img src=\"$this->img_pl\">";
    }
}