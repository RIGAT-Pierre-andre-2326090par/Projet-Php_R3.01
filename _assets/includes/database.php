<?php
    namespace includes\database;

    class database {
        public function getInstance(): \PDO {
            global $host, $username, $password, $name;
            try
            {
                // Connexion à la base de données.
                $dsn = 'mysql:host=' . $host . ';dbname=' . $name;
                $pdo = new \PDO($dsn, $username, $password);
                // Codage de caractères.
                $pdo->exec('SET CHARACTER SET utf8');
                // Gestion des erreurs sous forme d'exceptions.
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $pdo;
            }
            catch(PDOException $e)
            {
                // Affichage de l'erreur.
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
?>