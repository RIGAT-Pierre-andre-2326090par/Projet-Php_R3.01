<?php

namespace blog\models;

class sign_in
{
    function addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone): void
    {
        (new Tenrac())->insertTenrac($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone);
    }
}