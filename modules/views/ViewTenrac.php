<?php

namespace views;


class ViewTenrac
{
    /**
     * Affiche la page d'accueil de l'utilisateur
     * @param $user
     * @return void
     */
    function show($user): void
    {
        ob_start();
        ?>
        <h1>Bienvenue <?= $user['NOM_TR'] ?> !</h1>
        <br>
        <form action="/index.php?action=logout" method="POST">
            <button class="btn" type="submit">Se déconnecter</button>
        </form>
        <form action="/index.php?action=modifTenrac" method="POST">
            <button class="btn" type="submit" name="modifBouton">Modifier Tenrac</button>
        </form>
        <form action="/index.php?action=supprTenrac" method="POST">
            <button class="btn" type="submit" name="deleteBouton">Supprimer son compte</button>
        </form>

        <?php
        (new ViewLayout($user['NOM_TR'] . ' - Tenrac Lovers', ob_get_clean()))->show(); // On affiche le formulaire en plus du layout.
    }
}