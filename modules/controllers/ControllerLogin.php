<?php

namespace controllers;

use models\ModelTenrac;
use views\ViewLogin;

class ControllerLogin {
    public function execute(): void {
        session_start(); // Démarre la session

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? null);
            $password = trim($_POST['password'] ?? null);

            // Log des valeurs entrées
            echo "Email: " . htmlspecialchars($email) . "<br>";
            echo "Mot de passe (avant hashage): " . htmlspecialchars($password) . "<br>";

            if (empty($email) || empty($password)) {
                echo 'Veuillez renseigner tous les champs.';
                return;
            }

            $model = new ModelTenrac();
            $user = $model->getMail($email); // Récupération de l'utilisateur

            if ($user === null) {
                echo 'Aucun utilisateur trouvé avec cet email.<br>';
                return;
            }

            // Vérification des données récupérées
            echo "Mot de passe (haché) récupéré: " . htmlspecialchars($user['MDP_TR']) . "<br>";

            // Vérifie si le mot de passe est correct
            if (password_verify($password, $user['MDP_TR'])) {
                $_SESSION['user'] = $user; // Stocke l'utilisateur en session
                echo 'Vous êtes connecté !';
                header('Location: /index.php?action=accueil');
                exit();
            } else {
                echo 'Mot de passe incorrect ou adresse e-mail incorrect !<br>';
            }
        }

        (new ViewLogin())->show(); // Affiche la vue de connexion
    }
}

?>
