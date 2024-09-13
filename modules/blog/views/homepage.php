<?php
namespace blog\views;
class homepage {
    public function show(): void {
        ob_start();
?>
        <h1> Bienvenue sur Tenrac-Lovers </h1>
 <?php
        (new \blog\views\layout('Accueil', ob_get_clean()))->show();
    }
}