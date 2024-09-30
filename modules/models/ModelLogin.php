<?php

namespace models;

use includes\Database;
use PDO;

class ModelLogin {

    private $messageError;
    private $nb;
    public function __construct() {}

    public function setMessageError($messageError): void
    {
        $this->messageError = $messageError;
    }
    public function getMessageError()
    {
        return $this->messageError;
    }

    public function getNb()
    {
        return $this->nb;
    }
    public function setNb($nb): void
    {
        $this->nb = $nb;
    }

    public function login($email, $password): void  {
        // Obtenir une instance PDO
        // $pdo = (new Database())->getInstance();

        // Préparer la requête pour récupérer l'utilisateur par id
        $user = (new ModelTenrac())->getTenrac($email);
        if ($user !== -1) {
            // Démarrer la session (si elle n'est pas déjà démarrée)
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Enregistrer les informations dans la session
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $user;

            // Connexion réussie
            header('Location: /index.php?action=profilTenrac');

        } else {
                $this->setMessageError("<h2>Aucun utilisateur trouvé avec cet e-mail : " . htmlspecialchars($email) . "</h2>");
                $this->setNb(2);
        }
    }
}
