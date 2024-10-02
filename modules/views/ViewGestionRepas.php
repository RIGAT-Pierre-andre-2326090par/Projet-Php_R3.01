<?php

namespace views;

class ViewGestionRepas
{
    /**
     * renvoie la page de gestion du repas
     * @param $repas: tableau contenant les informations du repas
     * @return void
     */
    public function show($repas):void{
        $id=$repas['idrepas'];
        ob_start();
        ?>
        <section class="formulaire">
            <form action="/index.php?action=gestionRepas&id=<?= $id ?>" method="POST">
                <label for="dateRepas">Date :</label>
                <input type="text" name=dateRepas id="dateRepas" required><?= PHP_EOL; ?>
                <label for="clubRepas">Club :</label>
                <input type="text" name="clubRepas" id="clubRepas" required><br>

                <button type="submit" name="modifBouton" class="modif">Modifier</button>
            </form>
        </section>

        <?php
        (new ViewLayout('Gestion Repas', ob_get_clean()))->show();

    }
}