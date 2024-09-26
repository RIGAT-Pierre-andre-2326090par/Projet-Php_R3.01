<?php

namespace blog\models;

use PDO;
use PDOException;

class Clubs
{
    public function getClubs() {
        $pdo = (new \includes\database())->getInstance();
        $sql = 'SELECT NOM_CL nomclub, ID_CL id, ADRESSE_CL adresse, IMG_CL imageclub FROM CLUB LIMIT 3';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $clubs = [];
            while ($result = $stmt->fetch())
            {
                $clubs[] = new \blog\models\Club($result->id, $result->nomclub, $result->adresse, $result->imageclub);
            }
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
        return $clubs;
    }
}