<?php

namespace controllers;

class ControllerLogin {

    public function __construct() {
    }

    public function execute(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            (new \models\ModelLogin())->login($email, $password);
        }
        (new \views\ViewLogin())->show();

    }

}

