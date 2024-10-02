<?php

namespace views;

use models\ModelPlat;
use PDO;

class ViewPlat
{
    /**
     * constructeur de la classe ViewPlat
     */
    public function __construct(){}

    /**
     * Affichage de la page du plat
     * @param $plat
     * @param $ingredients
     * @return void
     */
    public function show($plat, $ingredients):void{
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
                    </section>
                    <section id="bottom">
                        <img id="plat" class="img_plat" alt="<?= $nom ?>" src="<?php echo '/_assets/images/plat/' . $image ?>"> <!--import depuis la BD-->
                    </section>
                </section>
                <section id="right">
                    <p id="description"><?php echo  $description ?></p>

                    <h3 id="ingredients">Ingrédients :</h3>
                    <div class="listeIngredients">


                        <?php if(count($ingredients) > 0){
                        foreach ($ingredients as $ingredient) { ?>
                            <ul>
                                <li><?= htmlspecialchars($ingredient->getNom()); ?></li>
                            </ul>
                        <?php }}?>
                    </div>

                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <!--boutons modification et suppression plats-->
                        <form action="/index.php?action=gestionPlat&id=<?= $id ?>" method="POST">
                            <button type="submit" class="modif">Modifier Plat</button>
                        </form>
                        <form action="/index.php?action=suppressionPlat&id=<?= $id ?>" method="POST">
                            <button class="delete" type="submit" name="deleteBouton">Supprimer plat</button>
                        </form>
                    <?php endif ?>
                </section>
            </section>
        </section>
        <?php
        (new ViewLayout('Plat', ob_get_clean()))->show();}

}
