<?php

use blog\controllers\Homepage;

//require '_assets/includes/autoloader.php';

try{
    (new Homepage())->execute();
}
catch(Exception $e){
    //(new \Blog\Views\Error($e->getMessage()))->show();
}