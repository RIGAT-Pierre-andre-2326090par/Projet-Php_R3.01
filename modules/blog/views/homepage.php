<?php
namespace blog\views;
class Homepage {
    public function show(): void {
        ob_start();
?>
        <h1> Bienvenue sur Tenrac-Lovers </h1>
 <?php
        (new \blog\views\Layout('Accueil', ob_get_clean()))->show();
    }
}