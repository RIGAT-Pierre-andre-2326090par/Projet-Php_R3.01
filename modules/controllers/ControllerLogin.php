<?php

namespace controllers;

use models\ModelTenrac;
use views\ViewLogin;

class ControllerLogin {
    public function execute(): void {
        session_start(); // Démarre la session au début de la fonction

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            // Ajout de log pour vérifier les valeurs des inputs
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

            // Vérification du mot de passe avec password_verify
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
