<?php


namespace blog\models;

use PDO;
use PDOException;

class plat
{
    public $nom;
    public $description;
    public $image;

    public function __construct($nom = null, $description = null, $image = null) {
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
    }

    public static function createEmpty() {
        return new self();
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

    public function getPlat($nom) {
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT * FROM PLAT WHERE NOM_PL = :nom');

        try {
            // Bind du paramètre nom
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            if ($stmt->rowCount() === 0) {
                return null; // Pas de plat trouvé
            }

            // Récupération du plat sous forme de tableau associatif
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }
}