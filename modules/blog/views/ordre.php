<?php

namespace blog\views;

class ordre
{
    public function show():void{
        ?>
        <h1>Ordre</h1>
        <p>Description de dingo wow</p>
        <h3>CLUBS</h3>
        <section class="infoClub">
            <img src="#" />
            <p> Nom </p> <br>
            <p> Adresse </p>
        </section>
        <section class="infoClub">
            <img src="#" />
            <p> Nom </p> <br>
            <p> Adresse </p>
        </section>
        <?php
        (new layout('Ordre et clubs', ob_get_clean()))->show();
    }


}
?>