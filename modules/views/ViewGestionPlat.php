<?php

namespace views;

class ViewGestionPlat
{
    public function show($plat):void{
        $id=$plat['ID_PL'];
        ob_start();
        ?>
        <section class="formulaire">
            <form action="/index.php?action=gestionPlat&id=<?= $id ?>" method="POST">
                <label for="nomPlat">Nom :</label>
                <input type="text" name=nomPlat id="nomPlat" required><?= PHP_EOL; ?>
                <label for="descPlat">Description :</label>
                <input type="text" name="descPlat" id="descPlat" required><br>
                <button class="modif" type="submit" name="updateBouton">Modifier</button>
            </form>
        </section>
        <?php
        (new ViewLayout('Gestion Plat', ob_get_clean()))->show();

    }
}