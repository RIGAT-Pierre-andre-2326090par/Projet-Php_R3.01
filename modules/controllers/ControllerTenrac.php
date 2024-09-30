<?php

namespace controllers;

class ControllerTenrac
{
    public function execute(): void
    {
        if ($_SESSION['user'] !== -1) {
            (new \views\ViewTenrac())->show();
        } else {
            header('location:index.php?action=login');
        }
    }
}