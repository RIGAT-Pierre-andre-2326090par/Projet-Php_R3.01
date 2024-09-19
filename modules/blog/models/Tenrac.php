<?php

namespace Blog\Models;

class Tenrac
{
    public function __construct(private $id_tr, private $courriel_tr, private $telephone_tr, private $grade_tr, private $rang_tr, private $titre_tr, private $dignite_tr, private $adresse_tr, private $nom_tr, private $id_cl){}

    public function show()
    {
        echo "<hr><br>$this->nom_tr, $this->adresse_tr, $this->courriel_tr, $this->telephone_tr, $this->grade_tr, $this->rang_tr, $this->titre_tr, $this->dignite_tr<br>";
    }

}