<?php

require '_assets/includes/autoloader.php';



try {
    if (filter_input(INPUT_GET, 'action')) {
        if ($_GET['action'] === 'plats') {
            $page = 0;
            if (isset($_GET['page'])) $page = urldecode($_GET['page']);
            (new \controllers\ControllerPlats())->execute($page);
        } elseif ($_GET['action'] === 'ordre') {
            $page = 0;
            if (isset($_GET['page'])) $page = urldecode($_GET['page']);
            (new \controllers\ControllerOrdre())->execute($page);
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

        } elseif ($_GET['action'] === 'forget') {
            (new \controllers\ControllerForgetPassword())->execute();
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
        } elseif ($_GET['action'] === 'recherche') {
            (new \controllers\ControllerRecherche())->execute();
        } elseif ($_GET['action'] === 'gestionClub') {
            (new \controllers\ControllerGestionClub())->execute();
        } elseif ($_GET['action'] === 'ajoutClub') {
            (new \controllers\ControllerAjoutClub())->execute();
        }
        elseif ($_GET['action']==='clubsupprime'){
            (new \views\ViewLayout('Club supprimé','<h2>Club supprimé</h2>'))->show();
        }   elseif ($_GET['action'] === 'tenrac') {
            (new \controllers\ControllerTenrac())->execute();
        }


    } else {
        (new \controllers\ControllerHomepage())->execute();
    }
} catch (Exception $e) {
    (new \views\ViewError())->show($e->getMessage());
}