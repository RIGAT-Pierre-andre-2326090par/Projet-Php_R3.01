<?php

namespace controllers;

class ControllerLogin {

    public function __construct() {
    }

    public function execute(): void {
        $model=(new \models\ModelLogin());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $model->login($email, $password);
        }
        if($model->getNb()==1 || $model->getNb()==2){
            (new \views\ViewLayout('Erreur',$model->getMessageError()))->show();
        }
        else{
            (new \views\ViewLogin())->show();
        }


    }

}

