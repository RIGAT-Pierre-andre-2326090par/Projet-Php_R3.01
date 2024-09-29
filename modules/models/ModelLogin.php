<?php

namespace models;

use includes\Database;

class ModelLogin {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Database())->getInstance(); // Récupérer l'instance de PDO
    }

    public function login($courriel, $password): bool {
        // Préparer la requête pour récupérer l'utilisateur
        $stmt = $this->pdo->prepare("SELECT NOM_TR, MDP_TR FROM TENRAC WHERE COURRIEL_TR = ?");
        $stmt->execute([$courriel]);

        // Vérifier si l'utilisateur existe
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            // Vérifier le mot de passe
            if (password_verify($password, $user['MDP_TR'])) { // Utiliser MDP_TR pour vérifier
                // Démarrer la session et enregistrer les informations de l'utilisateur
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['courriel'] = $courriel;
                $_SESSION['nom'] = $user['NOM_TR'];
                return true;
            } else {
                echo "Mot de passe incorrect pour l'utilisateur : " . htmlspecialchars($courriel);
                echo "Mot de passe incorrect :" . htmlspecialchars($password);
                echo "Mot de passe correct : " . $user['MDP_TR'];
            }
        } else {
            echo "Aucun utilisateur trouvé avec cet e-mail : " . htmlspecialchars($courriel);
        }

        // Si l'utilisateur n'existe pas ou le mot de passe est incorrect
        return false;
    }


    public function logout(): void {
        session_start();
        session_unset(); // Effacer les variables de session
        session_destroy(); // Détruire la session
        header('Location: /'); // Rediriger vers la page d'accueil
        exit(); // Terminer le script
    }
}
?>
