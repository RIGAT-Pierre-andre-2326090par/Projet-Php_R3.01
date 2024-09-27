<?php

namespace controllers;

class ControllerRepas
{
    public function execute($page): void{
        /*if (!isset($_SESSION['user'])) {
            // Redirige vers la page de connexion
            header('Location: /index.php?action=login');
            exit(); // Assurez-vous que le script s'arrête ici
        }*/

        $resultat = (new \models\ModelRepas())->getRepas($page, 5);
        $repas = $resultat['repas'];
        $pagemax = $resultat['pagemax'];

        (new \views\ViewRepas())->show($repas, $page, $pagemax);
    }
}