<?php

namespace views;

class ViewGestionClub
{
    public function show($club){
        $id=$club['ID_CL'];
        ob_start();
        ?>

        <form action="/index.php?action=gestionClub&id=<?= $id ?>" method="POST">
            <label for="nomClub">Nom :</label>
            <input type="text" name=nomClub id="nomClub" required><?= PHP_EOL; ?>
            <label for="adrClub">Adresse :</label>
            <input type="text" name="adrClub" id="adrClub" required><?= PHP_EOL; ?>
            <label for="descClub">Description :</label>
            <input type="text" name="descClub" id="descClub" required><br>
            <button type="submit" name="modifBouton">Modifier</button>
        </form>
        <?php
        (new ViewLayout('Gestion Club', ob_get_clean()))->show();

    }
}