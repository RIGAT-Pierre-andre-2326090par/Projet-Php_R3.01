<?php

namespace controllers;
use views\ViewForgetPassword;

class ControllerForgetPassword
{
public function execute (): void{
    (new ViewForgetPassword())->show(); // Affiche la vue ForgetPassword
}
}