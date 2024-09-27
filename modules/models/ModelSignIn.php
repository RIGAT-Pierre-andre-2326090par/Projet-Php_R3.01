<?php

namespace models;

class ModelSignIn
{
    function addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone,$id): void
    {
        (new ModelTenrac())->insertTenrac($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone,$id); // On utilise la fonction insertTenrac
        // présent dans le modèle avec les informations en paramètres

    }
}