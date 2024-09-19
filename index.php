<?php

require '_assets/includes/autoloader.php';

try{
    (new \blog\controllers\homepage())->execute();
}
catch(Exception $e){
    (new \blog\views\Error($e->getMessage()))->show();
}