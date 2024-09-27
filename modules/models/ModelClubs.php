<?php

namespace models;

use PDO;
use PDOException;

class ModelClubs
{
    public function getClubs($page = 0, $limit = 3) {
        $pdo = (new \includes\database())->getInstance();

        $sql = 'SELECT COUNT(*) as count FROM CLUB';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $count['count'];

        $sql = 'SELECT NOM_CL nomclub, ID_CL id, ADRESSE_CL adresse, IMG_CL imageclub FROM CLUB LIMIT :limit OFFSET :skipped';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $toskip = $page * $limit;
            $stmt->bindParam(':skipped', $toskip, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $clubs = [];
            while ($result = $stmt->fetch())
            {
                $clubs[] = new ModelClub($result->id, $result->nomclub, $result->adresse, $result->imageclub);
            }
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
        // resultat : plats et page max
        $resultat = [];
        $resultat['pagemax'] = ceil($count / $limit)-1;
        $resultat['clubs'] = $clubs;

        return $resultat;
    }
}