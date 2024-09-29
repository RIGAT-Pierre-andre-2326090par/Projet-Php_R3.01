<?php

namespace controllers;

use models\ModelClub;
use views\ViewClub;

class ControllerClub
{
    public function execute(): void {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $clubVide = ModelClub::createEmpty();
            $club = $clubVide->getClub($id);
            if ($club) {
                (new ViewClub())->show($club);
            } else {
                echo 'ModelClub non trouvé.';
            }
        } else {
            echo 'Aucun nom de club fourni.';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['deleteBouton'])) {
                (new \models\ModelGestionClub())->deleteClub($id);
            }
        }

    }
}