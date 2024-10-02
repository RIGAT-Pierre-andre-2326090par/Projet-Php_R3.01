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

    /**
     * contructeur de la classe ModelUnRepas
     * @param $idrp: id du repas
     * @param $dates: date du repas
     * @param $idcl: id du club
     * @param $nomclub: nom du club
     * @param $imageclub: image du club
     * @param $nomplat: nom du plat
     * @param $imageplat: image du plat
     */
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

    /**
     * renvoie l'image du plat
     * @return mixed|null: image du plat
     */
    public function getImageplat()
    {
        return $this->imageplat;
    }

    /**
     * renvoie le nom du plat
     * @return mixed|null: nom du plat
     */
    public function getNomplat()
    {
        return $this->nomplat;
    }

    /**
     * renvoie l'image du club
     * @return mixed|null: image du club
     */
    public function getImageclub()
    {
        return $this->imageclub;
    }

    /**
     * renvoie le nom du club
     * @return mixed|null: nom du club
     */
    public function getNomclub()
    {
        return $this->nomclub;
    }

    /**
     * renvoie l'id du club
     * @return mixed|null: id du club
     */
    public function getIdcl()
    {
        return $this->idcl;
    }

    /**
     * renvoie l'id du repas
     * @return mixed|null: id du repas
     */
    public function getIdrp()
    {
        return $this->idrp;
    }

    /**
     * renvoie la date du repas
     * @return mixed|null: date du repas
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * renvoie un repas vide
     * @return self: repas vide
     */
    public static function createEmpty() {
        return new self();
    }

    /**
     * renvoie un repas
     * @param $idrp: id du repas
     * @return mixed|void|null: repas
     */
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

            // resultat : plats et page max
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ', $e->getMessage(), PHP_EOL;
            exit();
        }
    }

    /**
     * Récupère les plats composant un repas donné
     * @param $idrepas
     * @return array
     */
    public function getPlats($idrepas) {
        $pdo = (new \includes\database())->getInstance();

        $sql2 = 'SELECT PLAT.ID_PL id, PLAT.IMG_PL imgplat, PLAT.NOM_PL nomplat, PLAT.DESC_PL descplat
                FROM REPAS
                JOIN est_compose
                ON est_compose.ID_RP = REPAS.ID_RP
                LEFT JOIN PLAT
                ON est_compose.ID_PL = PLAT.ID_PL
				WHERE REPAS.ID_RP = :idrepas';
        $stmt2 = $pdo->prepare($sql2); // Préparation d'une requête.
        $stmt2->bindParam(':idrepas', $idrepas, PDO::PARAM_STR);
        $stmt2->execute();
        $stmt2->rowCount();

        $stmt2->setFetchMode(PDO::FETCH_OBJ);
        $plats = [];
        while ($result = $stmt2->fetch())
        {
            $plats[] = new ModelPlat($result->id, $result->nomplat, $result->descplat, $result->imgplat) ;
        }

        return $plats;
    }
}