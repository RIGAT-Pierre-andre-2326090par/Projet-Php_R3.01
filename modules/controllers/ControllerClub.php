<?php

namespace controllers;

use models\ModelClub;
use views\ViewClub;

class ControllerClub
{
    /**
     * traite la requete de la page club
     * @return void
     */
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

        }
        else {
            echo 'Aucun nom de club fourni.';
        }


    }
}