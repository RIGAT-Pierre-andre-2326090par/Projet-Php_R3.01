<?php

    namespace models;

    use includes\Database;
    use PDO;

    class ModelLogin {

        private $messageError;
        private $nb;

        /**
         * le constructeur de la classe modelLogin
         */
        public function __construct() {}

        /**
         * définit le message d'erreur
         * @param $messageError: le message d'erreur
         * @return void
         */
        public function setMessageError($messageError): void
        {
            $this->messageError = $messageError;
        }

        /**
         * renvoie le message d'erreur
         * @return mixed: le message d'erreur
         */
        public function getMessageError()
        {
            return $this->messageError;
        }

        /**
         * retourne le numéro de l'erreur
         * @return mixed: le numéro de l'erreur
         */
        public function getNb()
        {
            return $this->nb;
        }

        /**
         * définit le numéro de l'erreur
         * @param $nb: le numéro de l'erreur
         * @return void
         */
        public function setNb($nb): void
        {
            $this->nb = $nb;
        }

        /**
         * connecte un utilisateur
         * @param $email: l'email de l'utilisateur
         * @param $password: le mot de passe de l'utilisateur
         * @return void
         */
        public function login($email, $password): void  {
            // Obtenir une instance PDO
            $pdo = (new Database())->getInstance();

            // Préparer la requête pour récupérer l'utilisateur par email
            $sql = 'SELECT MDP_TR, NOM_TR,ID_TR FROM TENRAC WHERE COURRIEL_TR = :email';
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
                    $_SESSION['user']= $user['ID_TR'];

                    // En cas d'erreur de mdp, ou de mot de passe, renvoie le texte suivant
                } else {
                    $this->setMessageError("<h2> L'adresse email ou le mot de passe est invalide. </h2>");
                    $this->setNb(1);
                }
            } else {
                    $this->setMessageError("<h2> L'adresse email ou le mot de passe est invalide. </h2>");
                    $this->setNb(2);
            }
        }




    }
