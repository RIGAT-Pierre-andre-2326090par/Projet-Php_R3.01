<?php

namespace models;

use Exception;
use PDO;
use PDOException;

class ModelGestionRepas
{
    private $pdo;

    /**
     * Le constructeur de la classe ModelGestionRepas
     */
    public function __construct()
    {
        $this->pdo = (new \includes\database())->getInstance();
    }

    /**
     * Insère un repas dans la base de données et retourne l'ID du repas inséré.
     * @param string $date : la date du repas
     * @param int $idcl : l'id du club
     * @return int : L'ID du repas inséré
     * @throws Exception
     */
    public function insertRepas($date, $idcl): int
    {
        try {
            $sql = 'SELECT NOM_CL club FROM CLUB WHERE ID_CL = :club';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':club', $idcl, PDO::PARAM_INT);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            if ($stmt->rowCount() === 0) {
                throw new Exception('Votre club sélectionné est invalide');
            }
        } catch (PDOException $e) {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }

        // Générer un nouvel ID pour le repas
        $sql = 'SELECT COALESCE(MAX(ID_RP), 0) + 1 AS new_id FROM REPAS';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $newId = $stmt->fetchColumn();

        try {
            $sql = 'INSERT INTO REPAS (DATES, ID_RP, ID_CL) VALUES (:date, :id, :idcl)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':idcl' => $idcl,
                ':date' => $date,
                ':id' => $newId
            ]);
            return $newId; // Retourner l'ID du repas inséré
        } catch (PDOException $e) {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }

    /**
     * Met à jour le repas choisi
     * @param string $date : la date du repas
     * @param int $id : l'id du repas
     * @param int $idcl : l'id du club
     * @return void
     * @throws Exception
     */
    public function updateRepas($date, $id, $idcl): void
    {
        try {
            $sql = 'SELECT NOM_CL club FROM CLUB WHERE ID_CL = :club';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':club', $idcl, PDO::PARAM_INT);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            if ($stmt->rowCount() === 0) {
                throw new Exception('Votre club sélectionné est invalide');
            }
        } catch (PDOException $e) {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }

        try {
            $sql = 'UPDATE REPAS SET ID_CL = :idcl, DATES = :date WHERE ID_RP = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':idcl' => $idcl,
                ':date' => $date,
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            // Affichage de l'erreur et rappel de la requête.
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }

    /**
     * Supprime un repas choisi
     * @param int $id : l'id du repas
     * @return void
     */
    public function deleteRepas($id): void
    {
        $sql = 'DELETE FROM REPAS WHERE ID_RP = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    /**
     * Met à jour une entrée dans la table est_compose
     * @param int $idRp : l'id du repas
     * @param int $idClOld : l'ancien id du club
     * @param int $idClNew : le nouvel id du club
     * @return void
     */
    public function updateCompose(int $idRp, int $idClOld, int $idClNew): void
    {
        $sql = 'UPDATE est_compose SET ID_CL = :idClNew WHERE ID_RP = :idRp AND ID_CL = :idClOld';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':idClNew' => $idClNew,
            ':idRp' => $idRp,
            ':idClOld' => $idClOld
        ]);
    }

    /**
     * Insère les plats dans le repas dans la base de données
     * @param int $idRepas : l'ID du repas
     * @param array $plats : tableau des plats à insérer
     * @return void
     * @throws Exception
     */
    public function insertCompose(int $idRepas, array $plats): void
    {
        foreach ($plats as $plat) {
            try {
                $sql = 'INSERT INTO est_compose (ID_RP, NOM_PL) VALUES (:idRepas, :plat)';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    ':idRepas' => $idRepas,
                    ':plat' => $plat
                ]);
            } catch (PDOException $e) {
                // Affichage de l'erreur et rappel de la requête.
                echo 'Erreur : ', $e->getMessage(), PHP_EOL;
                exit();
            }
        }
    }
}
