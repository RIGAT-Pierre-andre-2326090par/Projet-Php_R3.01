<?php
namespace blog\controllers;

use includes\database\DatabaseConnection;

class homepage {
    public function execute(): void {
        $plats = null;
        $clubs = null;
        (new \blog\views\homepage())->show($plats, $clubs);
    }
}