<?php

namespace blog\models;

class plat
{
    public function __construct() {}
    public function getPlat(){
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT * FROM PLAT WHERE NOM_PL=:id');
        try
        {
            $stmt->bindParam(':id', $nom);
            $stmt->execute();
        }
        if ($stmt->rowCount() === 0) {
            return null; // Pas de résultat, retourne null
        }
        // Récupération des résultats sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
        catch (PDOException $e)
        {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            echo 'Requête : ', $sql, PHP_EOL;
            exit();
        }
    }
}