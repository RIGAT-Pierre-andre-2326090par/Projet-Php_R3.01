<?php

namespace views;

class ViewAjoutRepas
{
    /**
     * renvoie le formulaire d'ajout d'un repas
     * @return void
     */
    public function show($clubs): void
    {
        ob_start();
        ?>
        <form action="/index.php?action=ajoutRepas" method="POST">
            <label for="dateRepas">Date :</label>
            <input type="date" name=dateRepas id="dateRepas" required><?= PHP_EOL; ?>
            <label for="clubRepas">Club :</label>
            <select name="clubRepas" id="clubRepas" required>
                <option value=""> -- Choisissez un club --</option>
                <?php foreach ($clubs as $club): ?>
                    <option value="<?= $club['ID_CL'] ?>"><?= $club['NOM_CL'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="ajoutBouton">Ajouter</button>
        </form>
        <?php
        (new ViewLayout('Ajout Repas', ob_get_clean()))->show();
    }
}