<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
            if (isset($_GET['id'])) {
                $nom = urldecode($_GET['id']);
                (new \controllers\ControllerPlat())->execute();
            } else {
                throw new Exception("Nom du plat non spécifié.");
            }
        } elseif ($_GET['action'] === 'accueil') {
            (new \controllers\ControllerHomepage())->execute();
        } elseif ($_GET['action'] === 'login') {
            (new \controllers\ControllerLogin())->execute();

        }elseif ($_GET['action'] === 'logout') {
            (new \controllers\ControllerLogin())->logout();
        }
        elseif ($_GET['action'] === 'sign_in') {
            (new \controllers\ControllerSignIn())->execute();
        }
        elseif ($_GET['action']==='usercree'){
            (new \controllers\ControllerSignIn())->execute();
        }
        elseif ($_GET['action'] === 'forget') {
            (new \controllers\ControllerForgetPassword())->execute();
        }
        elseif ($_GET['action'] === 'club') {
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
        } elseif ($_GET['action'] === 'gestionTenrac') {
            (new \controllers\ControllerTenrac())->execute($_SESSION['ID_TR']);
        } elseif ($_GET['action'] === 'supprTenrac') {
            (new \models\ModelTenrac())->deleteTenrac((new \models\ModelTenrac())->getTenracId($_POST['email'], $_POST['password']));
            (new \views\ViewLayout('Votre compte à été supprimé', '<h2>Votre compte à été supprimé</h2>'))->show();
        } elseif ($_GET['action'] === 'gestionClub') {
            (new \controllers\ControllerGestionClub())->execute();
        } elseif ($_GET['action'] === 'ajoutClub') {
            (new \controllers\ControllerAjoutClub())->execute();
        }
        elseif ($_GET['action']==='clubsupprime') {
            (new \controllers\ControllerGestionClub())->execute();
            (new \views\ViewLayout('Club supprimé', '<h2>Club supprimé</h2>'))->show();
        } elseif ($_GET['action'] === 'gestionRepas') {
            (new \controllers\ControllerGestionRepas())->execute();
        } elseif ($_GET['action'] === 'ajoutRepas') {
            (new \controllers\ControllerAjoutRepas())->execute();
        } elseif ($_GET['action']==='repassupprime'){
            (new \controllers\ControllerGestionRepas())->execute();
            (new \views\ViewLayout('Repas supprimé','<h2>Repas supprimé</h2>'))->show();
        }
        elseif ($_GET['action']==='gestionPlat'){
            (new \controllers\ControllerGestionPlat())->execute();
        } elseif ($_GET['action']==='suppressionPlat'){
            (new \controllers\ControllerGestionClub())->execute();
            (new \views\ViewLayout('Plat supprimé','<h2>Plat supprimé</h2>'))->show();
        }
        elseif ($_GET['action']==='confirmReset'){
            (new \controllers\ControllerForgetPassword())->execute();
        }

    } else {
        (new \controllers\ControllerHomepage())->execute();
    }
} catch (Exception $e) {
    (new \views\ViewError())->show($e->getMessage());
}