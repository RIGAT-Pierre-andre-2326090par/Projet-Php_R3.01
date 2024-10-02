<?php

namespace views;

class ViewAjoutClub
{
    /**
     * renvoie le formulaire d'ajout d'un club
     * @return void
     */
    public function show(): void
    {
        ob_start();
        ?>
    <section class="formulaire">
        <form action="/index.php?action=ajoutClub" method="POST">
            <label for="nomClub">Nom :</label>
            <input type="text" name=nomClub id="nomClub" required><?= PHP_EOL; ?>
            <label for="adrClub">Adresse :</label>
            <input type="text" name="adrClub" id="adrClub" required><?= PHP_EOL; ?>
            <label for="descClub">Description :</label>
            <input type="text" name="descClub" id="descClub" required><br>
            <button type="submit" name="ajoutBouton" class="modif" >Ajouter</button>
        </form>
    </section>

        <?php
        (new ViewLayout('Ajout Club', ob_get_clean()))->show();
    }
}