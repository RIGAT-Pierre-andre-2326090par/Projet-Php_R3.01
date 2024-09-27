<?php

require '_assets/includes/autoloader.php';

try {
    if (filter_input(INPUT_GET, 'action')) {
        if ($_GET['action'] === 'plats') {
            (new \controllers\ControllerPlats())->execute();
        } elseif ($_GET['action'] === 'ordre') {
            (new \controllers\ControllerOrdre())->execute();
        } elseif ($_GET['action'] === 'plat') {
            if (isset($_GET['nom'])) {
                $nom = urldecode($_GET['nom']);
                (new \controllers\ControllerPlat())->execute();
            } else {
                throw new Exception("Nom du plat non spécifié.");
            }
        } elseif ($_GET['action'] === 'accueil') {
            (new \controllers\ControllerHomepage())->execute();
        } elseif ($_GET['action'] === 'login') {
            (new \controllers\ControllerLogin())->execute();
        } elseif ($_GET['action'] === 'sign_in') {
            (new \controllers\ControllerSignIn())->execute();
        } elseif ($_GET['action'] === 'club') {
            if (isset($_GET['id'])) {
                $id = urldecode($_GET['id']);
                (new \controllers\ControllerClub())->execute();
            } else {
                throw new Exception("Nom du club non spécifié.");
            }
        } elseif ($_GET['action'] === 'unrepas') {
            if (isset($_GET['id'])) {
                $id = urldecode($_GET['id']);
                (new \controllers\ControllerUnRepas())->execute();
            } else {
                throw new Exception("ID du repas non spécifié.");
            }
        } elseif ($_GET['action'] === 'repas') {
            $page = 0;
            if (isset($_GET['page'])) $page = urldecode($_GET['page']);
            (new \controllers\ControllerRepas())->execute($page);
        } elseif ($_GET['action'] == 'recherche') {
            (new \controllers\ControllerRecherche())->execute();
        }
    } else {
        (new \controllers\ControllerHomepage())->execute();
    }
} catch (Exception $e) {
    (new \views\ViewError())->show($e->getMessage());
}