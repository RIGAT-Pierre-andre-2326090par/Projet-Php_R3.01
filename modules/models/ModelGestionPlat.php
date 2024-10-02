<?php

namespace models;

use PDO;
use PDOException;

class ModelGestionPlat
{
    private $pdo;

    /**
     * le constructeur de la classe ModelGestionPlat
     */
    public function __construct()
    {
        $this->pdo = (new \includes\database())->getInstance();

    }

    /**
     * met à jour le plat choisi
     * @param $id: l'id du plat
     * @param $nom: le nom du plat
     * @param $description: la description du plat
     * @return void
     */
    public function updatePlat($id, $nom, $description) {
        try{
            $sql = 'UPDATE PLAT SET NOM_PL = :nom, DESC_PL = :description WHERE ID_PL = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':id' => $id
            ]);
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
     * Insère un nouveau plat
     * @param $nom
     * @param $description
     * @param $image
     * @return void
     */
    public function insertPlat($nom,$description, $image): void
    {
        $sql = 'SELECT MAX(ID_PL) as max_id FROM PLAT';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['max_id'] !== null ? $result['max_id'] + 1 : 0;

        try {
            $sql = 'INSERT INTO PLAT (NOM_PL, DESC_PL, IMG_PL,ID_PL)
                    VALUES (:nom, :description, :image,:id)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':image' => $image,
                ':id' => $id
            ]);
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
     * supprime le plat choisi
     * @param $id: l'id du plat
     * @return void
     */
    public function deletePlat($id) {
        $sql = 'DELETE FROM PLAT WHERE ID_PL = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'=> $id
        ]);
    }
}