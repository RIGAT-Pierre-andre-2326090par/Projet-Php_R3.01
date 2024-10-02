<?php

namespace models;

use PDO;

class ModelTenrac
{
    private $pdo;
    private $id_tr;
    public $nom_tr;
    public $adresse_tr;
    public $img_tr;

    /**
     * Constructeur de la classe
     */
    public function __construct($id_tr = null, $nom_tr = null, $adresse_tr = null, $img_tr = null){
        $this->id_tr = $id_tr;
        $this->nom_tr = $nom_tr;
        $this->adresse_tr = $adresse_tr;
        $this->img_tr = $img_tr;
        $this->pdo = (new \includes\database())->getInstance();

    }

    public function getId(){
        return $this->id_tr;
    }

    public function getNom(){
        return $this->nom_tr;
    }
    public function getAdresse(){
        return $this->adresse_tr;
    }
    public function getImage(): string{
        return $this->img_tr;
    }

    /**
     * Fonction nous permettant d'ajouter un utilisateur
     * @param $nom: nom de l'utilisateur
     * @param $mdp: mot de passe de l'utilisateur
     * @param $adresse: adresse de l'utilisateur
     * @param $email: email de l'utilisateur
     * @param $telephone: téléphone de l'utilisateur
     * @return int: id de l'utilisateur ajouté
     */
    public function insertTenrac($nom, $mdp, $adresse, $email, $telephone,$grade,$rang,$titre,$dignite): int
    {
        $sql = 'SELECT MAX(ID_TR) as max_id FROM TENRAC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['max_id'] !== null ? $result['max_id'] + 1 : 0;
        $sql2 = 'INSERT INTO TENRAC (NOM_TR, MDP_TR, COURRIEL_TR, TELEPHONE_TR, ADRESSE_TR, ID_TR,GRADE_TR,RANG_TR,TITRE_TR,DIGNITE_TR) VALUES (:nom, :mdp, :email, :telephone, :adresse, :id, :grade, :rang, :titre, :dignite)';
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2->execute([
            ':nom' => $nom,
            ':mdp' => $mdp,
            ':email' => $email,
            ':telephone' => $telephone,
            ':adresse' => $adresse,
            ':id'=>$id,
            ':grade'=>$grade,
            ':rang'=>$rang,
            ':titre'=>$titre,
            ':dignite'=>$dignite
        ]);
        return $id; // Retourne l'id de l'utilisateur ajouté
    }

    /**
     * Fonction nous permettant de récupérer un utilisateur
     * @param $id_tr: id de l'utilisateur
     * @return array|null: tableau associatif de l'utilisateur ou null si aucun utilisateur n'est trouvé
     */
    public function getTenrac($id_tr): ? array {
        $stmt = $this->pdo->prepare('SELECT NOM_TR, COURRIEL_TR, TELEPHONE_TR, ADRESSE_TR,GRADE_TR,RANG_TR,TITRE_TR,DIGNITE_TR FROM TENRAC WHERE ID_TR = :id_tr');
        $stmt->bindValue(':id_tr', $id_tr);
        $stmt->execute();

        // Vérifie si un utilisateur a été trouvé
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne un tableau associatif
        }

        return null; // Retourne null si aucun utilisateur n'est trouvé
    }

    /**
     * Fonction nous permettant de changer certaines informations sur un utilisateur
     * @param $nom: nom de l'utilisateur
     * @param $mdp: mot de passe de l'utilisateur
     * @param $email: email de l'utilisateur
     * @param $telephone: téléphone de l'utilisateur
     * @param $adresse: adresse de l'utilisateur
     * @param $id_tr: id de l'utilisateur
     * @return void
     */
    public function updateTenrac($nom, $mdp, $email, $telephone, $adresse, $grade, $rang, $titre, $dignite, $id_tr): void
    {
        $sql = 'UPDATE TENRAC SET NOM_TR=:nom, MDP_TR=:mdp, COURRIEL_TR=:email, TELEPHONE_TR=:telephone, ADRESSE_TR=:adresse, GRADE_TR=:grade, RANG_TR=:rang, TITRE_TR=:titre, DIGNITE_TR=:dignite WHERE ID_TR=:id_tr';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':mdp' => password_hash($mdp,PASSWORD_DEFAULT),
            ':email' => $email,
            ':telephone' => $telephone,
            ':adresse' => $adresse,
            ':grade' => $grade,
            ':rang' => $rang,
            ':titre' => $titre,
            ':dignite' => $dignite,
            ':id_tr' => $id_tr
        ]);
        // return $stmt->fetch();
    }


    /**
     * Fonction qui nous permet de récupérer l'id d'un utilisateur grace à son email et son mot de passe
     * @param $email: email de l'utilisateur
     * @param $pwd: mot de passe de l'utilisateur
     * @return int: id de l'utilisateur ou -1 si aucun utilisateur n'est trouvé
     */
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

    /**
     * Fonction nous permettant de supprimer un utilisateur
     * @param $id_tr: id de l'utilisateur
     * @return void
     */
    public function deleteTenrac($id_tr):void {
        $sql = 'DELETE FROM TENRAC WHERE ID_TR = :id_tr';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_tr' => $id_tr
        ]);
    }

    /**
     * trouve un utilisateur par son mail
     * @param string $email: email de l'utilisateur
     * @return mixed: tableau associatif de l'utilisateur ou false si aucun utilisateur n'est trouvé
     */
    public function findUserByEmail(string $email) {
        $stmt = $this->pdo->prepare("SELECT * FROM TENRAC WHERE COURRIEL_TR = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(); // Retourne l'utilisateur ou false si non trouvé
    }

    /**
     * met à jour le mot de passe de l'utilisateur
     * @param string $email: email de l'utilisateur
     * @param string $newPassword: nouveau mot de passe
     * @return bool: true si la mise à jour a réussi, false sinon
     */
    public function updatePassword(string $email, string $newPassword): bool
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE TENRAC SET MDP_TR = :password WHERE email = :email");
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);

        return $stmt->execute(); // Retourne true si la mise à jour a réussi
    }
}