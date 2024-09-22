<?php

namespace blog\models;

class plat
{
    public $nom;
    public $description;
    public $image;

    public function __construct($nom, $description, $image) {
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
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

    public function getPlat(){
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT * FROM PLAT WHERE NOM_PL=:id');
        if ($stmt->rowCount() === 0) {
            return null; // Pas de résultat, retourne null
        }
        try
        {
            $stmt->bindParam(':id', $nom);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }

        // Récupération des résultats sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}