<?php

namespace views;

use models\ModelIngredient;

class ViewIngredient
{
    /**
     * renvoie la page de l'ingrédient
     * @param $ingredient: tableau associatif contenant les informations de l'ingrédient
     * @return void
     */
    public function show($ingredient): void {
        $id=$ingredient['ID_IG'];
        $nom=$ingredient['NOM_IG'];
        $image=$ingredient['IMG_IG'];
        ob_start();
        ?>
        <img alt="<? echo htmlspecialchars($nom); ?>" src="<?php echo '/_assets/images/ingredient/' . $image ?>" />
        <h2><?php echo  $nom ?></h2>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <form action="/index.php?action=gestionIngredient&id=<?= $id ?>" method="POST">
                <button type="submit" class="modif">Modifier Ingredient</button>
            </form>
            <form action="/index.php?action=ingredientsupprime&id=<?= $id ?>" method="POST">
                <button type="submit" name="deleteBouton" class="delete">Supprimer Ingredient</button>
            </form>
        <?php endif ?>
        <?php
        (new ViewLayout('Ingrédient', ob_get_clean()))->show();
    }

}