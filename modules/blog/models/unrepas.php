<?php


namespace blog\models;

use PDO;
use PDOException;

class unrepas
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
                REPAS.ID_CL idclub,
                IMG_CL imageclub, NOM_CL nomclub,
                IMG_PL imageplat, PLAT.NOM_PL nomplat
                FROM REPAS, PLAT, CLUB, est_compose EC
                WHERE REPAS.ID_CL = CLUB.ID_CL
                AND EC.NOM_PL = PLAT.NOM_PL
                AND EC.ID_RP = REPAS.ID_RP
                AND REPAS.ID_RP = :idrepas'
        );

        try {
            // Bind du paramètre nom
            $stmt->bindParam(':idrepas', $idrp, PDO::PARAM_STR);
            $stmt->execute();

            // Vérification si des résultats sont retournés
            if ($stmt->rowCount() === 0) {
                return null; // Pas de plat trouvé
            }

            // Récupération du plat sous forme de tableau associatif
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }
}