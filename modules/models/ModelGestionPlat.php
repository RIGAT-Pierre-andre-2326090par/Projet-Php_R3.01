<?php

namespace models;

class ModelGestionPlat
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new \includes\database())->getInstance();

    }

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
    public function deletePlat($id) {
        $sql = 'DELETE FROM PLAT WHERE ID_PL = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'=> $id
        ]);
    }
}