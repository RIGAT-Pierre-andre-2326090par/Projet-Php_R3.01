<?php

namespace blog\views;

class ordre
{
    public function show(): void {
        ob_start();
        ?>
        <img src="#" />
        <h2>Nom du club</h2>
        <h4>Adresse</h4>
        <p> Une description absolument pas intéressante blabla</p>

        <strong>Photos</strong>
        <img src="#" />
        <strong>Membres</strong>
        <img src="#" />
        <?php
        (new \blog\views\layout('Accueil', ob_get_clean()))->show();
    }
}
?>