<?php

namespace models;

use Exception;
use PDOException;
use PDO;


class ModelRecherche
{
    /**
     * le constructeur de la classe ModelRecherche
     */
    public function __construct(){}

    /**
     * retourne les plats qui correspondent à la recherche
     * @param $keyword: le mot clé de la recherche
     * @return array|void: les plats qui correspondent à la recherche
     * @throws Exception
     */
    public function getPlats($keyword){
        $pdo = (new \includes\database())->getInstance();
        $sql = 'SELECT ID_PL id, NOM_PL nomplat, DESC_PL descplat, IMG_PL imgplat FROM PLAT WHERE NOM_PL LIKE :keyword OR DESC_PL LIKE :keyword LIMIT 5';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
            $stmt->execute(); // Exécution de la requête.
            //$stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.
            $stmt->rowCount() or throw new Exception('Pas de résultat');

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $plats_searched = [];
            while ($result = $stmt->fetch())
            {
                $plats_searched[] = new ModelPlat($result->id, $result->nomplat, $result->descplat, $result->imgplat) ;
            }
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
        return $plats_searched;
    }
}