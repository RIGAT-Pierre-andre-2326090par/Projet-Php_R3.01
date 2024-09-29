<?php

namespace controllers;

class ControllerTenrac
{
    public function execute(): void
    {
        if ($_SESSION['user'] !== -1) {
            $id = $_SESSION['user'];
            $user = (new \models\ModelTenrac())->getTenrac($id);
            (new \views\ViewTenrac())->show();
        } else {
            header('location:index.php?action=login');
        }
    }
}