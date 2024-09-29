<?php

namespace views;

include '../models/ModelPlat.php';

use models\ModelPlat;
use PDO;

class ViewPlat
{
    public function __construct(){}

public function show($plat):void{
    $id = $plat['ID_PL'];
    $nom = $plat['NOM_PL']; // Nom du controllerPlat
    $description = $plat['DESC_PL']; // Description du controllerPlat
    $image = $plat['IMG_PL'];
    ob_start();
?>
        <section>
            <section id="topSide">
                <section id="leftside">
                    <section id="top">
                        <h2 id="nom_plat"> <?php echo $nom ?> </h2>
                        <img id="note" alt="<?= $nom ?>" class="img_plat" src="<?php echo '/_assets/images/plat/' . $image ?>">
                    </section>
                    <section id="bottom">
                        <img id="plat" alt="<?= $nom ?>" src="<?php echo '/_assets/images/plat/' . $image ?>"> <!--import depuis la BD-->
                    </section>
                </section>
                <section id="right">
                    <p id="description"><?php echo  $description ?></p>
                    <h3 id="ingredients"><!--import depuis la BD--></h3>
                    <ol id="liste_ingredients">
                        <!--fonction qui crée la liste des ingrédients-->
                        <?php
                            ModelPlat::getIngredients($plat);
                        ?>
                    </ol>
                    <!--boutons modification et suppression plats-->
                    <form action="/index.php?action=gestionPlat&id=<?= $id ?>" method="POST">
                        <button type="submit" class="modif">Modifier Plat</button>
                    </form>
                    <form action="/index.php?action=suppressionPlat&id=<?= $id ?>" method="POST">
                        <button class="delete" type="submit" name="deleteBouton">Supprimer plat</button>
                    </form>
                </section>
            </section>
            <section id="bottomSide">
                <p id="preparation"> <!--fonction qui crée la liste des ingrédients--></p>
            </section>
        </section>
            <?php
        (new ViewLayout('Plat', ob_get_clean()))->show();}
}
