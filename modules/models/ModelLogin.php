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
        $pdo = (new Database())->getInstance();

        // Préparer la requête pour récupérer l'utilisateur par email
        $sql = 'SELECT MDP_TR, NOM_TR FROM TENRAC WHERE COURRIEL_TR = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);

        $verify = $_POST["password"];
        // Vérifier si l'utilisateur existe
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC); // Récupérer un tableau associatif

            // Vérifier le mot de passe fourni par l'utilisateur avec le mot de passe haché
            if (password_verify($password, $user['MDP_TR'])) {
                // Démarrer la session (si elle n'est pas déjà démarrée)
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // Enregistrer les informations dans la session

                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $user['NOM_TR'];

                // Connexion réussie
            } else {
                $this->setMessageError("<h2>Mot de passe incorrect pour l'utilisateur : " . htmlspecialchars($email) . "</h2>");
                $this->setNb(1);
            }
        } else {
                $this->setMessageError("<h2>Aucun utilisateur trouvé avec cet e-mail : " . htmlspecialchars($email) . "</h2>");
                $this->setNb(2);
        }
    }




}
