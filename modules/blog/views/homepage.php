<?php
namespace blog\views;
class homepage {
    public function show(): void {
        ob_start();
?>
        <h1> Bienvenue sur Tenrac-Lovers </h1>
        <p> Découvre une myriade de plats plus gras les uns que les autres ! </p>
        <h2> De superbes plats </h2>
        <button>  Voir plus </button>
 <?php
        (new \blog\views\layout('Accueil', ob_get_clean()))->show();
    }
}