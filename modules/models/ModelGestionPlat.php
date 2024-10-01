<?php

namespace models;

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