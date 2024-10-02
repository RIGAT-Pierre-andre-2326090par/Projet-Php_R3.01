<?php

namespace models;

class ModelSignIn
{
    /**
     * Fonction qui permet d'ajouter un utilisateur
     * @param $Nom
     * @param $Mot_de_Passe
     * @param $Adresse
     * @param $Email
     * @param $Telephone
     * @param $grade
     * @param $rang
     * @param $titre
     * @param $dignite
     * @param $club
     * @return int
     */
    function addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone,$grade,$rang,$titre, $dignite, $club): int
    {
        return (new ModelTenrac())->insertTenrac($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone,$grade,$rang,$titre,$dignite,$club); // On utilise la fonction insertTenrac
        // présent dans le modèle avec les informations en paramètres

    }
}