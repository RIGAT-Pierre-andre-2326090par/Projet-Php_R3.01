<?php

namespace blog\models;

class Tenrac
{
    public function __construct(){

    }
    public function show(): void
    {

    }

    // FOnction nous permettant d'ajouter un utilisateur
    public function insertTenrac($nom, $email, $telephone, $adresse)
    {
        $sql = 'INSERT INTO TENRAC (NOM_TR, COURRIEL_TR, TELEPHONE_TR, ADRESSE_TR) VALUES (:nom, :email, :telephone, :adresse)';

    }

    // Fonction nous permettant de changer certaines informations sur un utilisateur
    public function updateTenrac($nom, $email, $telephone, $adresse, $id_tr)
    {
        $sql = 'UPDATE TENRAC SET NOM_TR=:nom, COURRIEL_TR=:email, TELEPHONE_TR=:telephone, ADRESSE_TR=:adresse WHERE ID_TR=:id_tr';
    }

    // Fonction qui nous permet de récupérer l'email d'un utilisateur
    public function getMail($email)
    {
        $pdo = (new \includes\database())->getInstance();
        $sql = 'SELECT * FROM TENRAC WHERE COURRIEL_TR = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Fonction nous permettant de supprimer un utilisateur
    public function deleteTenrac($id_tr){
        $sql = 'DELETE FROM TENRAC WHERE ID_TR = :id_tr';
    }


}