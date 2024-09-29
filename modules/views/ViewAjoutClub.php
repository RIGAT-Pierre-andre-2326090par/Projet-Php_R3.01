<?php

namespace views;

class ViewAjoutClub
{
    public function show(): void
    {
        ob_start();
        ?>
        <form action="/index.php?action=ajoutClub" method="POST">
            <label for="nomClub">Nom :</label>
            <input type="text" name=nomClub id="nomClub" required><?= PHP_EOL; ?>
            <label for="adrClub">Adresse :</label>
            <input type="text" name="adrClub" id="adrClub" required><?= PHP_EOL; ?>
            <label for="descClub">Description :</label>
            <input type="text" name="descClub" id="descClub" required><br>
            <label for="ordreClub">Ordre :</label>
            <input type="text" name="ordreClub" id="ordreClub" required><br>
            <button type="submit" name="ajoutBouton">Ajouter</button>
        </form>
        <?php
        (new ViewLayout('Ajout Club', ob_get_clean()))->show();
    }
}