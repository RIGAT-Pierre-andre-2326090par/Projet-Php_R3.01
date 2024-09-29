<?php

namespace models;

use PDO;

class ModelTenrac
{
    private $pdo;

    public function __construct(){
        $this->pdo = (new \includes\database())->getInstance();

    }

    // Fonction nous permettant d'ajouter un utilisateur
    public function insertTenrac($nom, $mdp, $adresse, $email, $telephone): int
    {
        $sql = 'SELECT MAX(ID_TR) as max_id FROM TENRAC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['max_id'] !== null ? $result['max_id'] + 1 : 0;
        $sql2 = 'INSERT INTO TENRAC (NOM_TR, MDP_TR, COURRIEL_TR, TELEPHONE_TR, ADRESSE_TR, ID_TR) VALUES (:nom, :mdp, :email, :telephone, :adresse, :id)';
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2->execute([
            ':nom' => $nom,
            ':mdp' => $mdp,
            ':email' => $email,
            ':telephone' => $telephone,
            ':adresse' => $adresse,
            ':id'=>$id
        ]);
        return $id; // Retourne l'id de l'utilisateur ajouté
    }

    public function getTenrac($id_tr): ?array {
        $stmt = $this->pdo->prepare('SELECT NOM_TR, COURRIEL_TR, TELEPHONE_TR, ADRESSE_TR FROM TENRAC WHERE ID_TR = :id_tr');
        $stmt->bindValue(':id_tr', $id_tr);
        $stmt->execute();

        // Vérifie si un utilisateur a été trouvé
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne un tableau associatif
        }

        return null; // Retourne null si aucun utilisateur n'est trouvé
    }

    // Fonction nous permettant de changer certaines informations sur un utilisateur
    public function updateTenrac($nom, $mdp, $email, $telephone, $adresse, $id_tr): void
    {
        $sql = 'UPDATE TENRAC SET NOM_TR=:nom, MDP_TR=:mdp, COURRIEL_TR=:email, TELEPHONE_TR=:telephone, ADRESSE_TR=:adresse WHERE ID_TR=:id_tr';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':mdp' => $mdp,
            ':email' => $email,
            ':telephone' => $telephone,
            ':adresse' => $adresse,
            ':id_tr' => $id_tr
        ]);
        // return $stmt->fetch();
    }

    // Fonction qui nous permet de récupérer l'id d'un utilisateur grace à son email et son mot de passe
    public function getTenracId($email, $pwd): int
    {
        $stmt = $this->pdo->prepare("SELECT ID_TR FROM TENRAC WHERE COURRIEL_TR = :email AND MDP_TR = :pwd");
        $stmt->execute([
            ':email' => $email,
            ':pwd' => $pwd
        ]);
        // Vérifie si un utilisateur a été trouvé
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne l'id de l'utilisateur
        }
        return -1; // Retourne -1 si aucun utilisateur n'est trouvé
    }


    // Fonction nous permettant de supprimer un utilisateur
    public function deleteTenrac($id_tr):void {
        $sql = 'DELETE FROM TENRAC WHERE ID_TR = :id_tr';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_tr' => $id_tr
        ]);
    }
}