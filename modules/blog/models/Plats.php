<?php

namespace Blog\Models;

class Plats
{
    public function __construct(private $nom_pl, private $img_pl){}

    public function show()
    {
        echo "<hr><br>$this->nom_pl<br>
            <img src=\"$this->img_pl\">";
    }
}