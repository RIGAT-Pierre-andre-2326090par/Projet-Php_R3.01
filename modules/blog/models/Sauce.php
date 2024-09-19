<?php

namespace Blog\Models;

class Sauce
{
    public function __construct(private $nom_sc, private $img_sc){}

    public function show()
    {
        echo "<hr><br>$this->nom_sc<br>";
    }
}