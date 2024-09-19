<?php
namespace blog\controllers;

class homepage {
    public function execute(): void {
        (new \blog\views\homepage())->show();
    }
}