<?php
namespace blog\controllers;

use PDO;
use PDOException;

class homepage {
    public function execute(): void {
        $pdo = (new \includes\database())->getInstance();

        $sql = 'SELECT NOM_PL nomplat FROM PLAT LIMIT 10';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            ob_start();
            while ($result = $stmt->fetch())
            {
                (new \blog\models\Plats($result->nomplat, null))->show();
            }
            $plats = ob_get_clean();
        }
        catch (PDOException $e)
        {
        // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }

        $sql = 'SELECT NOM_CL nomclub, ID_CL id, ADRESSE_CL adresse FROM CLUB LIMIT 10';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            ob_start();
            while ($result = $stmt->fetch())
            {
                (new \blog\models\Club($result->id, $result->nomclub, $result->adresse, null))->show();
            }
            $clubs = ob_get_clean();
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
        (new \blog\views\homepage())->show($plats, $clubs);
    }
}