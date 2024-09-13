<?php
namespace blog\controllers\Homepage;

class Homepage {
    public function execute(): void {
        (new \blog\views\Homepage())->show();
    }
}