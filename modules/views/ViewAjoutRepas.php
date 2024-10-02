<?php

namespace views;

class ViewAjoutRepas
{
    /**
     * renvoie le formulaire d'ajout d'un repas
     * @return void
     */
    public function show($clubs, $plats): void
    {
        ob_start();
        ?>
        <section class="form-repas">
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
                <label for="platRepas" id="platRepas">Plat :</label>
                <select name="platRepas" id="platRepas" required>
                    <option value=""> -- Choisissez un plat -- </option>
                    <?php foreach ($plats as $plat): ?>
                        <option value="<?= $plat['ID_PL'] ?>"><?= $plat['NOM_PL'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="ajoutBouton">Ajouter</button>
            </form>
        </section>
        <?php
        (new ViewLayout('Ajout Repas', ob_get_clean()))->show();
    }
}