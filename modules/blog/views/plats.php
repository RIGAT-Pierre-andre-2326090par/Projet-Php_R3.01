<?php

namespace blog\views;

class plats{
    public function show(): void {
        ob_start();
        ?>
        <h2>De superbes plats</h2>
        <p>Découvrez nos plats sensationnels</p>

        <section class="plat">
            <img src="#" />
            <h3>Titre Plat1</h3>
            <p>Description longue de ouf</p>
        </section>

        <section class="plat">
            <img src="#" />
            <h3>Titre Plat1</h3>
            <p>Description longue de ouf</p>
        </section>

        <section class="plat">
            <img src="#" />
            <h3>Titre Plat1</h3>
            <p>Description longue de ouf</p>
        </section>

        <section class="plat">
            <img src="#" />
            <h3>Titre Plat1</h3>
            <p>Description longue de ouf</p>
        </section>

        <section class="plat">
            <img src="#" />
            <h3>Titre Plat1</h3>
            <p>Description longue de ouf</p>
        </section>

        <section class="plat">
            <img src="#" />
            <h3>Titre Plat1</h3>
            <p>Description longue de ouf</p>
        </section>
        <?php
        (new layout('Plats', ob_get_clean()))->show();
    }}
?>