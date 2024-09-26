<?php

namespace controllers;

use models\ModelClub;

class ControllerClub
{
    public function execute(): void {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $clubVide = ModelClub::createEmpty();
            $club = $clubVide->getClub($id);
            if ($club) {
                (new \views\ViewClub())->show($club);
            } else {
                echo 'ModelClub non trouvé.';
            }
        } else {
            echo 'Aucun nom de viewClub fourni.';
        }
    }
}