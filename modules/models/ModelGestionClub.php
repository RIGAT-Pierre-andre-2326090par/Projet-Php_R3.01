<?php

namespace models;

use PDO;
use PDOException;

class ModelGestionClub
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new \includes\database())->getInstance();

    }

    public function insertClub($nom, $adresse, $description, $image, $ordre): void
    {

        try {
            $sql = 'SELECT NOM_OR ordre WHERE NOM_OR = :ordre';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':ordre', $ordre, PDO::PARAM_STR);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            $stmt->rowCount() or throw new Exception('Votre ordre selectionné est invalide');
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }

        $sql = 'SELECT MAX(ID_CL) as max_id FROM CLUB';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['max_id'] !== null ? $result['max_id'] + 1 : 0;

        try {
            $sql = 'INSERT INTO CLUB (NOM_CL, ADRESSE_CL, DESC_CL, IMG_CL, NOM_OR)
                    VALUES (:nom, :adresse, :description, :image, :ordre, :id)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':adresse' => $adresse,
                ':description' => $description,
                ':image' => $image,
                ':ordre' => $ordre,
                ':id' => $id
            ]);
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
    }

    public function updateClub($id,$nom, $adresse, $description): void
    {
        try{
            $sql = 'UPDATE CLUB SET NOM_CL = :nom, ADRESSE_CL = :adresse, DESC_CL = :description WHERE ID_CL = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':adresse' => $adresse,
                ':description' => $description,
                ':id' => $id
            ]);
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
    }

    public function deleteClub($id): void
    {
        $sql = 'DELETE FROM CLUB WHERE ID_CL = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'=> $id
        ]);
    }
}