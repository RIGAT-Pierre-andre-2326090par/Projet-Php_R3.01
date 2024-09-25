<?php

require '_assets/includes/autoloader.php';

try{
    if (filter_input(INPUT_GET, 'action')) {
        if ($_GET['action'] == 'plats') {
            (new blog\controllers\plats())->execute();
        } elseif ($_GET['action'] == 'ordre') {
            (new blog\controllers\ordre())->execute();
        } elseif ($_GET['action'] == 'plat') {
            (new blog\controllers\plat())->execute();
            if (isset($_GET['nom'])) {
                $nom = urldecode($_GET['nom']);
                (new blog\controllers\plat())->execute();
            } else {
                throw new Exception("Nom du plat non spécifié.");
            }
        } elseif ($_GET['action'] == 'accueil') {
            (new blog\controllers\homepage())->execute();
        } elseif ($_GET['action'] == 'login') {
            (new blog\controllers\login())->execute();
        }


    }
    else (new blog\controllers\homepage())->execute();
}	
catch(Exception $e){
    (new \blog\views\error())->show($e->getMessage());
}
