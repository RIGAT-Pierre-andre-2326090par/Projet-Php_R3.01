<?php
namespace blog\models;
use PDO;
use PDOException;


class Plats
{
    public function getPlats(){
        $pdo = (new \includes\database())->getInstance();
        $sql = 'SELECT NOM_PL nomplat, DESC_PL descplat, IMG_PL imgplat FROM PLAT LIMIT 10';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $plats = [];
            while ($result = $stmt->fetch())
            {
                $plats[] = new \blog\models\Plat($result->nomplat, $result->descplat, $result->imgplat);
            }
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
        return $plats;
    }
}