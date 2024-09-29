<?php

namespace models;

use Exception;
use PDO;
use PDOException;

class ModelGestionRepas
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new \includes\database())->getInstance();

    }

    public function insertRepas($date, $idcl): void
    {
        try {
            $sql = 'SELECT NOM_CL club FROM CLUB WHERE ID_CL = :club';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':club', $idcl, PDO::PARAM_STR);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            $stmt->rowCount() or throw new Exception('Votre club selectionné est invalide');
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }

        $sql = 'SELECT MAX(ID_RP) as max_id FROM REPAS';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['max_id'] !== null ? $result['max_id'] + 1 : 0;

        try {
            $sql = 'INSERT INTO REPAS (DATES, ID_RP, ID_CL)
                    VALUES (:date, :id, :idcl)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':idcl' => $idcl,
                ':date' => $date,
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

    public function updateRepas($date, $id, $idcl): void
    {
        try {
            $sql = 'SELECT NOM_CL club FROM CLUB WHERE ID_CL = :club';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':club', $idcl, PDO::PARAM_STR);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            $stmt->rowCount() or throw new Exception('Votre club selectionné est invalide');
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }

        try{
            $sql = 'UPDATE REPAS SET ID_CL = :idcl, DATES = :date WHERE ID_RP = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':idcl' => $idcl,
                ':date' => $date,
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

    public function deleteRepas($id): void
    {
        $sql = 'DELETE FROM REPAS WHERE ID_RP = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'=> $id
        ]);
    }
}