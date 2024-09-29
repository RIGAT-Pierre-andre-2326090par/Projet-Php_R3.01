<?php

namespace views;

class ViewAjoutRepas
{
    public function show(): void
    {
        ob_start();
        ?>
        <form action="/index.php?action=ajoutRepas" method="POST">
            <label for="nomClub">Date :</label>
            <input type="text" name=dateRepas id="dateRepas" required><?= PHP_EOL; ?>
            <label for="clubRepas">Club :</label>
            <input type="text" name="clubRepas" id="clubRepas" required><br>
            <button type="submit" name="ajoutBouton">Ajouter</button>
        </form>
        <?php
        (new ViewLayout('Ajout Repas', ob_get_clean()))->show();
    }
}