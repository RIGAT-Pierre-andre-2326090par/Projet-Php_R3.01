<?php

namespace models;

use includes\database;
use PDO;

class ModelIngredient
{
    public $id_ig;
    public $nom_ig;
    public $img_ig;

    /**
     * le constructeur de la classe ModelIngredient
     * @param $id_ig : le nom de l'ingrédient
     * @param $nom_ig: le nom de l'ingrédient
     * @param $img_ig: le chemin de l'image de l'ingrédient
     */
    public function __construct($id_ig = null, $nom_ig = null, $img_ig = null)
    {
        $this->id_ig = $id_ig;
        $this->nom_ig = $nom_ig;
        $this->img_ig = $img_ig;
    }

    /**
     * créer un ingredient vide
     * @return self: un ingredient vide
     */
    public static function createEmpty()
    {
        return new self();
    }

    /**
     * retourne les infos d'un ingredient
     * @param $id_ig : l'id du ingredient
     * @return mixed|void|null: les infos du ingredient
     */
    public function getIngredient($id_ig)
    {
        $pdo = (new database())->getInstance();
        $stmt = $pdo->prepare('SELECT NOM_IG,IMG_IG,ID_IG FROM INGREDIENT WHERE ID_IG=:id');
        try {
            $stmt->bindParam(':id', $id_ig, \PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                return null; // Pas de résultat, retourne null
            }
            // Récupération des résultats sous forme de tableau associatif
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }

    }

    /**
     * retourne le nom du ingrédient
     * @return string: le nom du ingrédient
     */
    public function getNom(): string
    {
        return $this->nom_ig;
    }

    /**
     * retourne le nom du ingrédient
     * @return string: le nom du ingrédient
     */
    public function getId(): string
    {
        return $this->id_ig;
    }


    /**
     * retourne l'image du ingrédient
     * @return string: l'image du ingrédient
     */
    public function getImage(): string
    {
        return $this->img_ig;
    }
}