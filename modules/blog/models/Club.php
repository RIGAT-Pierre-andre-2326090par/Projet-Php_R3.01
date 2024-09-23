<?php

namespace blog\models;

class Club
{
    public function __construct(private $nom_cl, private $adresse_cl, private $img_cl){}

    public function getClub(){
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT * FROM CLUB WHERE ID_CL=:id');
        if ($stmt->rowCount() === 0) {
            return null; // Pas de résultat, retourne null
        }
        try
        {
            $stmt->bindParam(':id', $id);
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

    public function getNom() :string
    {
        return $this->nom_cl;
    }

    public function getAdresse() :string
    {
        return $this->adresse_cl;
    }

    public function getImage() :string
    {
        return $this->img_cl;
    }
}