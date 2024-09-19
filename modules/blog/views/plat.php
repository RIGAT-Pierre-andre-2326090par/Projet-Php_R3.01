<?php

namespace blog\views;

class plat
{

public function show():void{
    ob_start();
?>
        <section>
            <section id="topSide">
                <section id="leftside">
                    <section id="top">
                        <h2 id="nom_ingredient"> <!--import depuis la BD--></h2>
                        <img id="note" <!--import depuis la BD-->>
                    </section>
                    <section id="bottom">
                        <img id="plat" <!--import depuis la BD-->>
                    </section>
                </section>
                <section id="right">
                    <p id="description"><!--import depuis la BD--></p>
                    <h3 id="ingredients"><!--import depuis la BD--></h3>
                    <ol id="liste_ingredients">
                        <!--fonction qui crée la liste des ingrédients-->
                    </ol>
                </section>
            </section>
            <section id="bottomSide">
                <p id="preparation"> <!--fonction qui crée la liste des ingrédients--></p>
            </section>
        </section>
            <?php
        (new layout('plat', ob_get_clean()))->show();

}