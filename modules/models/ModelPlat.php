<?php


namespace models;

use PDO;
use PDOException;

class ModelPlat
{
    public $id;

    public $nom;
    public $description;
    public $image;

    public function __construct($id = null, $nom = null, $description = null, $image = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
    }

    public static function createEmpty() {
        return new self();
    }

    public function getId(): string {
        return $this->id;
    }
    public function getNom(): string {
        return $this->nom;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getPlat($id) {
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT * FROM PLAT WHERE ID_PL = :id');

        try {
            // Bind du paramètre nom
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            if ($stmt->rowCount() === 0) {
                return null; // Pas de controllerPlat trouvé
            }

            // Récupération du controllerPlat sous forme de tableau associatif
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }

    /*public static function getIngredients($plat) {
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT nom_ig FROM INGREDIENT JOIN plat_contient ON INGREDIENT.nom_ig = plat_contient.nom_ig WHERE plat_contient.nom_pl = "Burger Poulet et Raclette"');

        try {
            $stmt->bindParam(':plat', $plat, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                return null;
            }

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }*/
}