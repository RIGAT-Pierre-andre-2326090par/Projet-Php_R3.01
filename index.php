<?php
require '_assets/includes/autoload.php';

try{
    (new \modules\blog\controllers\Homepage())->execute();
}
catch(\Exception $e){
    (new \Blog\Views\Error($e->getMessage()))->show();
}