<?php
namespace blog\controllers;

class Homepage {
    public function execute(): void {
        (new \blog\views\homepage())->show();
    }
}