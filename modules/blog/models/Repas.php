<?php

namespace blog\models;
use PDO;
use PDOException;

class Repas
{
    public function getRepas() {
        $pdo = (new \includes\database())->getInstance();
        $sql = 'SELECT ID_RP idrepas, ID_CL idclub, PLAT.ID_PL idplat, DATES dates,
                   IMG_CL imageclub, NOM_CL nomclub,
                   IMG_PL imageplat, NOM_PL nomplat
                FROM REPAS, PLAT, CLUB, est_compose EC
                WHERE idclub = CLUB.ID_CL
                AND EC.ID_PL = idplat
                AND EC.ID_RP = idrepas
                LIMIT 5';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $repas = [];
            while ($result = $stmt->fetch())
            {
                $repas[] = new \blog\models\unrepas(
                    $result->idrepas,  $result->dates,
                    $result->idclub, $result->idplat,
                    $result->nomclub, $result->imageclub,
                    $result->nomplat, $result->imageplat
                );
            }
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
        return $repas;
    }
}