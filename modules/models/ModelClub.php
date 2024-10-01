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

    /**
     * le constructeur de la classe ModelClub
     * @param $id_cl: l'id du club
     * @param $nom_cl: le nom du club
     * @param $adresse_cl : l'adresse du club
     * @param $img_cl: l'image du club
     */
    public function __construct($id_cl = null, $nom_cl = null, $adresse_cl = null, $img_cl = null){
        $this->id_cl = $id_cl;
        $this->nom_cl = $nom_cl;
        $this->adresse_cl = $adresse_cl;
        $this->img_cl = $img_cl;
    }

    /**
     * créer un club vide
     * @return self: un club vide
     */
    public static function createEmpty() {
        return new self();
    }

    /**
     * retourne les infos d'un club
     * @param $id_cl: l'id du club
     * @return mixed|void|null: les infos du club
     */
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

    /**
     * retourne l'id du club
     * @return int: l'id du club
     */
    public function getId(): int {
        return $this->id_cl;
    }

    /**
     * retourne le nom du club
     * @return string: le nom du club
     */
    public function getNom() :string
    {
        return $this->nom_cl;
    }

    /**
     * retourne l'adresse du club
     * @return string: l'adresse du club
     */
    public function getAdresse() :string
    {
        return $this->adresse_cl;
    }

    /**
     * retourne l'image du club
     * @return string: l'image du club
     */
    public function getImage() :string
    {
        return $this->img_cl;
    }

    public function getMembreClub($id_cl){
        $pdo = (new database())->getInstance();
        $stmt = $pdo->prepare('SELECT ID_TR FROM TENRAC WHERE ID_CL=:id');
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
}