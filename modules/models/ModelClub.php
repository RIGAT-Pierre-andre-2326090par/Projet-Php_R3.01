<?php

namespace models;

use PDO;
use PDOException;
use includes\database;


class ModelClub
{
    public $id_cl;
    public $nom_cl;
    public $adresse_cl;
    public $img_cl;

    public function __construct($id_cl = null,$nom_cl = null,$adresse_cl = null,$img_cl = null){
        $this->id_cl = $id_cl;
        $this->nom_cl = $nom_cl;
        $this->adresse_cl = $adresse_cl;
        $this->img_cl = $img_cl;
    }
    public static function createEmpty() {
        return new self();
    }

    public function getClub($id_cl){
        $pdo = (new database())->getInstance();
        $stmt = $pdo->prepare('SELECT ID_CL,NOM_CL,ADRESSE_CL,IMG_CL,DESC_CL FROM CLUB WHERE ID_CL=:id');
        try
        {
            $stmt->bindParam(':id', $id_cl, \PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                return null; // Pas de résultat, retourne null
            }
            // Récupération des résultats sous forme de tableau associatif
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }

    }
    public function getId(): int {
        return $this->id_cl;
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