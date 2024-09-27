<?php

namespace models;
use PDO;
use PDOException;

class ModelRepas
{
    public function getRepas($page = 0, $limit = 3) {
        $pdo = (new \includes\database())->getInstance();

        $sql = 'SELECT COUNT(*) as count FROM REPAS';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $count['count'];

        $sql = 'SELECT REPAS.ID_RP idrepas, DATES dates, REPAS.ID_CL idclub, CLUB.IMG_CL imageclub, CLUB.NOM_CL nomclub, PLAT.IMG_PL imageplat, PLAT.NOM_PL nomplat
                FROM REPAS
                LEFT JOIN CLUB
                ON REPAS.ID_CL = CLUB.ID_CL
                LEFT JOIN est_compose
                ON est_compose.ID_RP = REPAS.ID_RP
                LEFT JOIN PLAT
                ON est_compose.NOM_PL = PLAT.NOM_PL 
                LIMIT :limit
                OFFSET :skipped;';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $toskip = $page * $limit;
            $stmt->bindParam(':skipped', $toskip, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $repas = [];
            while ($result = $stmt->fetch())
            {
                $repas[] = new \models\ModelUnRepas(
                    $result->idrepas, $result->dates,
                    $result->idclub,
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

        // resultat : plats et page max
        $resultat = [];
        $resultat['pagemax'] = ceil($count / $limit)-1;
        $resultat['repas'] = $repas;

        return $resultat;
    }
}