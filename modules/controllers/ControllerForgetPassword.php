<?php

namespace controllers;
use views\ViewForgetPassword;

class ControllerForgetPassword
{
public function show (): void{
    (new ViewForgetPassword())->show();
}
}