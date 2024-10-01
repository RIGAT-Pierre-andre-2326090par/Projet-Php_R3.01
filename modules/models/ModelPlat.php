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

    /**
     * le constructeur de la classe ModelPlat
     * @param $id: l'id du plat
     * @param $nom: le nom du plat
     * @param $description: la description du plat
     * @param $image: l'image du plat
     */
    public function __construct($id = null, $nom = null, $description = null, $image = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * renvoie un plat vide
     * @return self: un plat vide
     */
    public static function createEmpty() {
        return new self();
    }

    /**
     * renvoie l'id du plat
     * @return string: l'id du plat
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * renvoie le nom du plat
     * @return string: le nom du plat
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * renvoie la description du plat
     * @return string: la description du plat
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * renvoie l'image du plat
     * @return string: l'image du plat
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * renvoie un plat
     * @param $id: l'id du plat
     * @return mixed|void|null: le plat
     */
    public function getPlat($id) {
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT * FROM PLAT WHERE ID_PL = :id');

        try {
            // Bind du paramètre id
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
        $stmt = $pdo->prepare('SELECT nom_ig FROM INGREDIENT JOIN plat_contient ON INGREDIENT.nom_ig = plat_contient.nom_ig WHERE plat_contient.nom_pl = :nom_pl');

        try {
            $stmt->bindParam(':nom_pl', $plat, PDO::PARAM_STR);
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