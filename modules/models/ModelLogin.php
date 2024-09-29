<?php

namespace models;

use PDO;

class ModelLogin
{
    private $pdo;

    public function __construct(){
        $this->pdo = (new \includes\database())->getInstance();

    }

    // Fonction nous permettant de vérifier si un utilisateur existe
    public function getTenrac($email, $password): int {
        $stmt = $this->pdo->prepare('SELECT ID_TR FROM TENRAC WHERE COURRIEL_TR = :email AND MDP_TR = :password');
        $stmt->execute([
                ':email' => $email,
                ':password' => $password
        ]);

        // Vérifie si un utilisateur a été trouvé
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne l'id de l'utilisateur
        }

        return -1; // Retourne -1 si aucun utilisateur n'est trouvé
    }
}
