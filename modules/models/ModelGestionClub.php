<?php

namespace models;

use PDOException;

class ModelGestionClub
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new \includes\database())->getInstance();

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

    public function deleteClub(): void
    {
        $sql = 'DELETE FROM CLUB WHERE ID_CL = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
}