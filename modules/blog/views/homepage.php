<?php
namespace blog\views;
class homepage {
    public function show($plats, $clubs): void {
        ob_start();
?>
        <h1>Bienvenue sur Tenrac-Lovers TEST</h1>
        <p>Découvre une myriade de plats plus gras les uns que les autres !</p>
        <h2>De superbes plats</h2>
        <?php echo $plats?>
        <a>Voir plus</a>
        <h2>Des clubs a votre portée</h2>
        <?php echo $clubs?>
        <a>Voir plus</a>
        <?php
        (new layout('Accueil', ob_get_clean()))->show();
    }
}