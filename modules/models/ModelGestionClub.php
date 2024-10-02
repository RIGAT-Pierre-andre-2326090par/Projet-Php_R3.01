<?php

namespace models;

use Exception;
use includes\database;
use PDO;
use PDOException;

class ModelGestionClub
{
    private PDO $pdo;

    /**
     * le constructeur de la classe ModelGestionClub
     */
    public function __construct()
    {
        $this->pdo = (new database())->getInstance();

    }

    /**
     * insere un club dans la base de donnée
     * @param $nom: le nom du club
     * @param $adresse: l'adresse du club
     * @param $description: la description du club
     * @param $image: l'image du club
     * @return void
     * @throws Exception
     */
    public function insertClub($nom, $adresse, $description, $image): void
    {
        $sql = 'SELECT MAX(ID_CL) as max_id FROM CLUB';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['max_id'] !== null ? $result['max_id'] + 1 : 0;

        try {
            $sql = 'INSERT INTO CLUB (NOM_CL, ADRESSE_CL, DESC_CL, IMG_CL, ID_CL)
                    VALUES (:nom, :adresse, :description, :image, :id)'; // On insère les valeurs en SQL avec nos paramètres
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':adresse' => $adresse,
                ':description' => $description,
                ':image' => $image,
                ':id' => $id // On met à jour nos variables.
            ]);
        }
        catch (PDOException $e) // On gère l'exception
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
    }

    /**
     * met à jour le club choisi
     * @param $id: l'id du club
     * @param $nom: le nom du club
     * @param $adresse: l'adresse du club
     * @param $description: la description du club
     * @return void
     */
    public function updateClub($id, $nom, $adresse, $description): void
    {
        try{
            $sql = 'UPDATE CLUB SET NOM_CL = :nom, ADRESSE_CL = :adresse, DESC_CL = :description WHERE ID_CL = :id'; // On met à jour notre club
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

    /**
     * supprime le club choisi
     * @param $id: l'id du club
     * @return void
     */
    public function deleteClub($id): void
    {
        $sql = 'DELETE FROM CLUB WHERE ID_CL = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'=> $id
        ]);
    }
}