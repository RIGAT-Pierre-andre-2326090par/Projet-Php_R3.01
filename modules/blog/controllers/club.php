<?php

namespace blog\controllers;

class club
{
    public function execute(): void {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $clubVide = \blog\models\Club::createEmpty();
            $club = $clubVide->getClub($id);
            if ($club) {
                (new \blog\views\club())->show($club);
            } else {
                echo 'Club non trouvé.';
            }
        } else {
            echo 'Aucun nom de club fourni.';
        }
    }
}