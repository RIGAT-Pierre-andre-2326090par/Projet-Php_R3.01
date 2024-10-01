<?php

namespace models;

class ModelSignIn
{
    /**
     * Fonction qui permet d'ajouter un utilisateur
     * @param $Nom: Nom de l'utilisateur
     * @param $Mot_de_Passe: Mot de passe de l'utilisateur
     * @param $Adresse: Adresse de l'utilisateur
     * @param $Email: Email de l'utilisateur
     * @param $Telephone: Téléphone de l'utilisateur
     * @return int: Retourne l'id de l'utilisateur ajouté
     */
    function addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone,$grade,$rang,$titre, $dignite): int
    {
        return (new ModelTenrac())->insertTenrac($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone,$grade,$rang,$titre,$dignite); // On utilise la fonction insertTenrac
        // présent dans le modèle avec les informations en paramètres

    }
}