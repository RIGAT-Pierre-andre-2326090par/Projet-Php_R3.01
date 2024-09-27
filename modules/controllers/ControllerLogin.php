<?php

namespace controllers;

use models\ModelTenrac;
use views\ViewLogin;

class ControllerLogin {
    public function execute(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if (empty($email) || empty($password)) {
                echo 'Veuillez renseigner tous les champs.';
                return;
            }

            $model = new ModelTenrac(); // Assurez-vous de passer l'instance de PDO
            $user = $model->getMail($email); // Récupération de l'utilisateur

            if ($user === null) {
                echo 'Aucun utilisateur trouvé avec cet email.';
                return;
            } else {
                echo '<pre>';
                print_r($user);  // Affiche les informations de l'utilisateur récupérées de la base de données
                echo '</pre>';
            }

            // Vérifie si l'utilisateur existe
            if ($user !== null && password_verify($password, $user['MDP_TR'])) {
                $_SESSION['user'] = $user; // Stocke l'utilisateur en session
                echo 'Vous êtes connecté !';
                header('Location: /index.php?action=accueil');
                exit();
            } else {
                echo 'Mot de passe ou adresse e-mail incorrect !';
            }
        }

        (new ViewLogin())->show(); // Affiche la vue de connexion
    }
}
