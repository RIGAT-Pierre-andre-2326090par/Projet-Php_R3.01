<?php

namespace models;

use PDO;
use PDOException;
class ModelTenracs
{
    /**
     * Renvoie la liste des membres d'un club
     * @param $id_cl
     * @return array|void
     */
    public function getTenracsClub($id_cl){
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare('SELECT TENRAC.ID_TR id, TENRAC.NOM_TR nomtenrac, TENRAC.GRADE_TR gradetenrac, TENRAC.COURRIEL_TR courrieltenrac, TENRAC.TELEPHONE_TR telephonetenrac, TENRAC.ADRESSE_TR adressetenrac, TENRAC.IMG_TR imgtenrac FROM TENRAC WHERE TENRAC.ID_CL = :id_cl');

        try {
            $stmt->bindParam(':id_cl', $id_cl, PDO::PARAM_STR);
            $stmt->execute();

            $stmt->rowCount();// or die('Aucun membre trouvé' . PHP_EOL); // S'il y a des résultats.

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $membres = [];
            while ($result = $stmt->fetch())
            {
                $membres[] = new ModelTenrac($result->id, $result->nomtenrac, $result->gradetenrac, $result->courrieltenrac, $result->telephonetenrac, $result->adressetenrac, $result->imgtenrac) ;
            }

        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
        return $membres;
    }
}