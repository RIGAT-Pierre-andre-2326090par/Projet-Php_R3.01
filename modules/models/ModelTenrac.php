<?php

namespace models;

use PDO;

class ModelTenrac {
    private $sql;

    public function __construct() {
        $this->sql = new PDO('mysql:host=localhost;dbname=tenrac', 'username', 'password');
    }

    // Récupère un utilisateur par courriel
    public function getTenracByEmail($email) {
        $stmt = $this->sql->prepare('SELECT courriel, Nom_TR, MDP_TR FROM Tenrac WHERE courriel = ?');
        $stmt->execute([$email]);

        // Vérifie s'il y a une correspondance
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}
