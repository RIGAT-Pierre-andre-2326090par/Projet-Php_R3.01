<?php


namespace models;

use PDO;
use PDOException;

class ModelUnRepas
{
    public $dates;
    public $idrp;
    public $idcl;
    public $nomclub;
    public $imageclub;
    public $nomplat;
    public $imageplat;

    public function __construct($idrp = null, $dates = null, $idcl = null,
                                $nomclub = null, $imageclub = null, $nomplat = null, $imageplat = null) {
        $this->dates = $dates;
        $this->idrp = $idrp;
        $this->idcl = $idcl;
        $this->nomclub = $nomclub;
        $this->imageclub = $imageclub;
        $this->nomplat = $nomplat;
        $this->imageplat = $imageplat;
    }

    public function getImageplat()
    {
        return $this->imageplat;
    }

    public function getNomplat()
    {
        return $this->nomplat;
    }

    public function getImageclub()
    {
        return $this->imageclub;
    }

    public function getNomclub()
    {
        return $this->nomclub;
    }

    public function getIdcl()
    {
        return $this->idcl;
    }

    public function getIdrp()
    {
        return $this->idrp;
    }

    public function getDates()
    {
        return $this->dates;
    }

    public static function createEmpty() {
        return new self();
    }

    public function getRepas($idrp) {
        $pdo = (new \includes\database())->getInstance();
        $stmt = $pdo->prepare(
        'SELECT REPAS.ID_RP idrepas, DATES dates,
                CLUB.ID_CL idclub, PLAT.ID_PL idplat ,
                CLUB.IMG_CL imageclub, CLUB.NOM_CL nomclub,
                PLAT.IMG_PL imageplat, PLAT.NOM_PL nomplat
                FROM REPAS
                LEFT JOIN CLUB
                ON REPAS.ID_CL = CLUB.ID_CL
                LEFT JOIN est_compose
                ON REPAS.ID_RP = est_compose.ID_RP
                LEFT JOIN PLAT
                ON est_compose.ID_PL = PLAT.ID_PL
                AND REPAS.ID_RP = :idrepas'
        );

        try {
            // Bind du paramètre nom
            $stmt->bindParam(':idrepas', $idrp, PDO::PARAM_STR);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            if ($stmt->rowCount() === 0) {
                return null; // Pas de controllerPlat trouvé
            }

            // Récupération du controllerPlat sous forme de tableau associatif
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }
}