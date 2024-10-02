<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '_assets/includes/autoloader.php';

try {
    /*if (filter_input(INPUT_GET, 'action')){
        $str_ctrl = 'Controller' . $_GET['action'];
        if (isset($_GET['page'])) $page = urldecode($_GET['page']);
        elseif (isset($_GET['id'])) $page = urldecode($_GET['id']);
        call_user_func(array($str_ctrl, 'execute'), array($page));
    } elseif (filter_input(INPUT_GET, 'ctrl')){
        $str_ctrl = 'Controller' . $_GET['ctrl'];
        call_user_func(array($str_ctrl, 'execute'));
    } else (new \controllers\ControllerHomepage())->execute();*/
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
            (new \controllers\ControllerTenrac())->execute();
        } elseif ($_GET['action'] === 'modifTenrac') {
            (new \views\ViewGestionTenrac())->show((new \models\ModelTenrac())->getTenrac($_SESSION['user']));
        }
        elseif ($_GET['action'] === 'tenracmodifie') {
            (new \controllers\ControllerGestionTenrac())->execute();
        }
        elseif ($_GET['action'] === 'supprTenrac') {
            (new \controllers\ControllerGestionTenrac())->execute();
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
        }
        elseif ($_GET['action']==='ajoutPlat'){
            (new \controllers\ControllerAjoutPlat())->execute();
        }
        elseif ($_GET['action']==='suppressionPlat'){
            (new \controllers\ControllerGestionPlat())->execute();
            (new \views\ViewLayout('Plat supprimé','<h2>Plat supprimé</h2>'))->show();
        }
        elseif ($_GET['action']==='confirmReset'){
            (new \controllers\ControllerForgetPassword())->execute();
        }
        elseif ($_GET['action'] === 'ingredient') {
            if (isset($_GET['id'])) {
                $id = urldecode($_GET['id']);
                (new \controllers\ControllerIngredient())->execute();
            } else {
                throw new Exception("ID de l'ingrédient non spécifié.");
            }
        } elseif ($_GET['action'] === 'ingredients') {
            $page = 0;
            if (isset($_GET['page'])) $page = urldecode($_GET['page']);
            (new \controllers\ControllerIngredients())->execute($page);
        }
    } else {
        (new \controllers\ControllerHomepage())->execute();
    }
} catch (Exception $e) {
    (new \views\ViewError())->show($e->getMessage());
}