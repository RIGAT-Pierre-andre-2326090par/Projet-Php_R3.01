<?php

namespace models;

use Exception;
use PDOException;
use PDO;

class ModelIngredients
{
    public $id;
    public $nom;
    public $image;

    /**
     * le constructeur de la classe ModelIngredients
     * @param $id
     * @param $nom
     * @param $image
     */
    public function __construct($id = null, $nom = null, $image = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->image = $image;
    }

    /**
     * renvoie le nom de l'ingrédient
     * @return string
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * retourne les ingrédients
     * @param $idPlat
     * @return array|void
     */
    public function getIngredientsPlat($idPlat) {
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT INGREDIENT.ID_IG id, INGREDIENT.NOM_IG nomingredient, INGREDIENT.IMG_IG imgingredient
            FROM INGREDIENT JOIN plat_contient ON INGREDIENT.ID_IG = plat_contient.ID_IG
            WHERE plat_contient.ID_PL = :idPlat');

        try {
            $stmt->bindParam(':idPlat', $idPlat, PDO::PARAM_STR);
            $stmt->execute();

            $stmt->rowCount();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $ingredients = [];
            while ($result = $stmt->fetch())
            {
                $ingredients[] = new ModelIngredient($result->id, $result->nomingredient, $result->imgingredient) ;
            }

        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
        return $ingredients;
    }

    /**
     * retourne les infos d'un ingredient
     * @param int $page : page
     * @param int $limit : limite d'affichage
     * @return mixed|void|null: les infos du ingredient
     */
    public function getIngredients(int $page = 0, int $limit = 3){
        $pdo = (new \includes\database())->getInstance();

        $sql = 'SELECT COUNT(*) as count FROM INGREDIENT';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $count['count'];

        $sql = 'SELECT INGREDIENT.ID_IG id, INGREDIENT.NOM_IG nomingredient,
                       INGREDIENT.IMG_IG imgingredient
                FROM INGREDIENT
                LIMIT :limit
                OFFSET :skipped';
        $stmt = $pdo->prepare($sql); // Préparation d'une requête.
        try
        {
            $toskip = $page * $limit;
            $stmt->bindParam(':skipped', $toskip, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

            $stmt->execute(); // Exécution de la requête.
            $stmt->rowCount() or die('Pas de résultat' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $ingredients = [];
            while ($result = $stmt->fetch())
            {
                $ingredients[] = new ModelIngredient(
                    $result->id,
                    $result->nomingredient,
                    $result->imgingredient
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

        // resultat : ingrédients et page max
        $resultat = [];
        $resultat['pagemax'] = ceil($count / $limit)-1;
        $resultat['ingredients'] = $ingredients;
        return $resultat;
    }
}