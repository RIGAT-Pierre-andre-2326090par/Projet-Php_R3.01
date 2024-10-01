<?php

namespace models;

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

    public function getNom(): string {
        return $this->nom;
    }
    public function getIngredients($idPlat) {
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT INGREDIENT.ID_IG id, INGREDIENT.NOM_IG nomingredient, INGREDIENT.IMG_IG imgingredient FROM INGREDIENT JOIN plat_contient ON INGREDIENT.ID_IG = plat_contient.ID_IG WHERE plat_contient.ID_PL = :idPlat');

        try {
            $stmt->bindParam(':idPlat', $idPlat, PDO::PARAM_STR);
            $stmt->execute();

            $stmt->rowCount() or die('Aucun ingrédient trouvé' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $ingredients = [];
            while ($result = $stmt->fetch())
            {
                $ingredients[] = new ModelPlat($result->id, $result->nomingredient, $result->imgingredient) ;
            }

        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
        return $ingredients;
    }
}