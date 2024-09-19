<?php

require '_assets/includes/autoloader.php';

try{
    if (filter_input(INPUT_GET, 'action')){
        if ($_GET['action'] == 'plats'){
            (new \blog\controllers\plats())->execute();
        }
        elseif ($_GET['action'] == 'ordre'){
            (new \blog\controllers\ordre())->execute();
        }
        elseif ($_GET['action'] == 'repas'){
            (new \blog\controllers\repas())->execute();
        }
    } else {
        (new \blog\controllers\homepage())->execute();
    }
}
catch(Exception $e){
    (new \blog\views\Error($e->getMessage()))->show();
}