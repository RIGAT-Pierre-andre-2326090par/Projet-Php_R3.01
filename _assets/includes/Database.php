<?php
namespace includes;

use PDO;
use PDOException;

class  database {
    private dbpass $pass; // Non-static property

    /**
     * Le constructeur de la classe database
     */
    public function __construct() {
        $this->pass = new dbpass(); // Initialize dbpass instance
    }

    /**
     * Crée une connexion à la base de données
     * @return PDO
     */
    public function getInstance(): PDO {
        // Access the dbpass properties
        $host = $this->pass->host;
        $username = $this->pass->username;
        $password = $this->pass->password;
        $name = $this->pass->name;

        try {
            // Connection to the database
            $dsn = 'mysql:host=' . $host . ';dbname=' . $name;
            $pdo = new PDO($dsn, $username, $password);
            // Character encoding
            $pdo->exec('SET CHARACTER SET utf8');
            // Enable exception-based viewError handling
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            // Display the viewError
            die('Erreur : ' . $e->getMessage());
        }
    }
}

