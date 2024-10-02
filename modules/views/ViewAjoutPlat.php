<?php

namespace views;

class ViewAjoutPlat
{
    /**
     * Affiche le formulaire d'ajout d'un plat
     * @return void
     */
    public function show(): void
    {
        ob_start();
        ?>
        <form action="/index.php?action=ajoutPlat" method="POST">
            <label for="nomPlat">Nom :</label>
            <input type="text" name=nomPlat id="nomPlat" required><?= PHP_EOL; ?>
            <label for="descPlat">Description</label>
            <input type="text" name=descPlat id="descPlat" required><?= PHP_EOL; ?>
            <label for="imgPlat">Image</label>
            <input type="url" name=imgPlat id="imgPlat" required><?= PHP_EOL; ?>
            <button type="submit" name="ajoutBouton">Ajouter</button>
        </form>
        <?php
        (new ViewLayout('Ajout Plat', ob_get_clean()))->show();
    }
}