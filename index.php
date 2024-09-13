<?php
require '_assets/includes/autoloader.php';

try{
    (new \modules\blog\controllers\Homepage())->execute();
}
catch(\Exception $e){
    (new \Blog\Views\Error($e->getMessage()))->show();
}