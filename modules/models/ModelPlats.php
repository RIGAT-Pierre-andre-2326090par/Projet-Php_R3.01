<?php
namespace models;
use PDO;
use PDOException;


class ModelPlats
{
    public function __construct(){}
    public function getPlats($page = 0, $limit = 3){
        $pdo = (new \includes\database())->getInstance();

        $sql = 'SELECT COUNT(*) as count FROM PLAT';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $count['count'];

        $sql = 'SELECT NOM_PL nomplat, DESC_PL descplat, IMG_PL imgplat FROM PLAT LIMIT :limit OFFSET :skipped';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $toskip = $page * $limit;
            $stmt->bindParam(':skipped', $toskip, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $plats = [];
            while ($result = $stmt->fetch())
            {
                $plats[] = new ModelPlat($result->nomplat, $result->descplat, $result->imgplat) ;
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
        $resultat['plats'] = $plats;
        return $resultat;
    }
}