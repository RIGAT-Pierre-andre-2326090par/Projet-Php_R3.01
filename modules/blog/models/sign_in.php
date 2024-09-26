<?php

namespace blog\models;

class sign_in
{
    function addUser($Nom, $Mot_de_Passe, $Adresse, $Email, $Telephone): void
    {
        $pdo = (new \includes\database())->getInstance();
        $sql = 'INSERT INTO USER (NOM_USER, MDP_USER, ADR_USER, MAIL_USER, TEL_USER) VALUES (:Nom, :Mot_de_Passe, :Adresse, :Email, :Telephone)';
        $stmt = $pdo->prepare($sql);
    }
}