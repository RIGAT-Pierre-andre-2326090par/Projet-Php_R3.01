<?php

namespace blog\views;

class club
{
    public function show(): void {
        ob_start();
        ?>
        
        <?php
        (new \blog\views\layout('Accueil', ob_get_clean()))->show();
    }

}