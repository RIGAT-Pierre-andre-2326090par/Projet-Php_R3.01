<?php

require '_assets/includes/autoloader.php';

try {
    if (filter_input(INPUT_GET, 'action')) {
        if ($_GET['action'] === 'plats') {
            (new blog\controllers\plats())->execute();
        } elseif ($_GET['action'] === 'ordre') {
            (new blog\controllers\ordre())->execute();
        } elseif ($_GET['action'] === 'plat') {
            if (isset($_GET['nom'])) {
                $nom = urldecode($_GET['nom']);
                (new blog\controllers\plat())->execute();
            } else {
                throw new Exception("Nom du plat non spécifié.");
            }
        } elseif ($_GET['action'] === 'accueil') {
            (new blog\controllers\homepage())->execute();
        } elseif ($_GET['action'] === 'login') {
            (new blog\controllers\login())->execute();
        } elseif ($_GET['action'] === 'sign_in') {
            (new blog\controllers\sign_in())->execute();
        } elseif ($_GET['action'] === 'club') {
            if (isset($_GET['id'])) {
                $id = urldecode($_GET['id']);
                (new blog\controllers\club())->execute();
            } else {
                throw new Exception("Nom du club non spécifié.");
            }
        } elseif ($_GET['action'] === 'unrepas') {
            if (isset($_GET['id'])) {
                $id = urldecode($_GET['id']);
                (new blog\controllers\unrepas())->execute();
            } else {
                throw new Exception("ID du repas non spécifié.");
            }
        } elseif ($_GET['action'] === 'repas') {
            (new blog\controllers\repas())->execute();
        } elseif ($_GET['action'] == 'recherche') {
            (new blog\controllers\ControllerRecherche())->execute();
        }
    } else {
        (new blog\controllers\homepage())->execute();
    }
} catch (Exception $e) {
    (new \blog\views\error())->show($e->getMessage());
}
