<?php

namespace blog\views;

class plat
{
    public function __construct(){}

public function show($plat):void{
    $nom = $plat['NOM_PL']; // Nom du plat
    $description = $plat['DESC_PL']; // Description du plat
    $image = $plat['IMG_PL'];
    ob_start();
?>
        <section>
            <section id="topSide">
                <section id="leftside">
                    <section id="top">
                        <h2 id="nom_plat"> <?php echo  $nom ?> </h2>
                        <img id="note" src="<?php echo  $image ?>">
                    </section>
                    <section id="bottom">
                        <img id="plat"> <!--import depuis la BD-->
                    </section>
                </section>
                <section id="right">
                    <p id="description"><?php echo  $description ?></p>
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
        (new layout('plat', ob_get_clean()))->show();}
}
