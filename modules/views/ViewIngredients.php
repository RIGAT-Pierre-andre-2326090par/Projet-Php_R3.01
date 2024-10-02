<?php

namespace views;

class ViewIngredients
{
    /**
     * renvoie la page des ingredients
     * @param $ingredients: liste des ingredients
     * @param $page: page actuelle
     * @param $pagemax: nombre de pages
     * @return void
     */
    public function show($ingredients, $page, $pagemax):void{
        ?>

        <h1>Ingrédients</h1>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a class="btn" href="/index.php?action=ajoutIngredient">Ajouter un Ingredient</a>
        <?php endif ?>

        <div class="liste">
            <?php foreach ($ingredients as $ingredient) { ?>
                <a href="/index.php?action=ingredient&id=<?= urlencode($ingredient->getId()); ?>">
                    <section class="infoIngredient">
                        <img src="<?= htmlspecialchars('/_assets/images/ingredient/' . $ingredient->getImage()); ?>" alt="<?= htmlspecialchars($ingredient->getNom()); ?>" />
                        <div>
                            <h3><em><?= htmlspecialchars($ingredient->getNom()); ?></em></h3>
                        </div>
                    </section>
                </a>
            <?php }?>
        </div>
        <ul>
            <?php for ($i = ($page-2 >= 0) ? ($page-2) : 0; ($i <= $page+2) && ($i <= $pagemax); $i++) { ?>
                <li><a href="<?php echo '/index.php?action=ingredients&page='.$i ?>"><?php echo $i+1 ?></a></li>
            <?php } ?>
        </ul>
        <?php
        (new ViewLayout('Ingrédients', ob_get_clean()))->show();
    }
}
?>