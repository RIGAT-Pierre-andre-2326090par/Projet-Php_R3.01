<?php

namespace blog\models;

class Tenrac
{
    private $pdo;


    public function __construct(){
        $this->pdo = (new \includes\database())->getInstance();

    }

    // Fonction nous permettant d'ajouter un utilisateur
    public function insertTenrac($nom, $mdp, $email, $telephone, $adresse): void
    {
        $sql = 'INSERT INTO TENRAC (NOM_TR, MDP_TR, COURRIEL_TR, TELEPHONE_TR, ADRESSE_TR) VALUES (:nom, :mdp, :email, :telephone, :adresse)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        // return $stmt->fetch();
    }

    // Fonction nous permettant de changer certaines informations sur un utilisateur
    public function updateTenrac($nom, $mdp, $email, $telephone, $adresse, $id_tr): void
    {
        $sql = 'UPDATE TENRAC SET NOM_TR=:nom, MDP_TR=:mdp COURRIEL_TR=:email, TELEPHONE_TR=:telephone, ADRESSE_TR=:adresse WHERE ID_TR=:id_tr';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        // return $stmt->fetch();
    }

    // Fonction qui nous permet de récupérer l'email d'un utilisateur
    public function getMail($email)
    {
        $sql = 'SELECT * FROM TENRAC WHERE COURRIEL_TR = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $email; // $stmt->fetch();
    }

    // Fonction nous permettant de supprimer un utilisateur
    public function deleteTenrac($id_tr) {
        $sql = 'DELETE FROM TENRAC WHERE ID_TR = :id_tr';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


}