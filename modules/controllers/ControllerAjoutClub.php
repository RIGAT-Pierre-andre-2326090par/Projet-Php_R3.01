<?php
namespace controllers;
class ControllerAjoutClub
{
    public function execute(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si le bouton d'ajout a été soumis
            if (isset($_POST['ajoutBouton'])) {
                $nom = $_POST['nomClub'];
                $adr = $_POST['adrClub'];
                $desc = $_POST['descClub'];
                $ordre = $_POST['ordreClub'];
                $img = strtolower(str_replace(' ', '_', $_POST['nomClub'])) . '.webp';
                (new \models\ModelGestionClub())->insertClub($nom, $adr, $desc, $img, $ordre);
            }
        }
        (new \views\ViewAjoutClub())->show();
    }
}
