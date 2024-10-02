<?php
namespace controllers;
use Exception;
use models\ModelGestionClub;
use views\ViewAjoutClub;

class ControllerAjoutClub
{
    /**
     * Traite la requete de la page ajoutClub
     * @return void
     * @throws Exception
     */
    public function execute(): void
    {
        if (!isset($_SESSION['user'])) { // On vérifie si on est connecté
            // Redirige vers la page de connexion
            header('Location: /index.php?action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton d'ajout a été soumis
            if (isset($_POST['ajoutBouton'])) {
                $nom = $_POST['nomClub'];
                $adr = $_POST['adrClub'];
                $desc = $_POST['descClub'];
                $img = strtolower(str_replace(' ', '_', $_POST['nomClub'])) . '.webp';
                (new ModelGestionClub())->insertClub($nom, $adr, $desc, $img); // On insère notre club avec ces nouvelles valeurs
                header('Location: /index.php?action=ordre'); // Redirection vers les clubs une fois l'ajout effectué
                exit();
            }
        }
        (new ViewAjoutClub())->show(); // On montre notre vue AjoutClub
    }
}
