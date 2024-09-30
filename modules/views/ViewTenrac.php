<?php

namespace views;

use models\ModelTenrac;

class ViewTenrac
{
    function show(): void
    {
        $user = (new ModelTenrac())->getTenrac($_SESSION['user']); // On récupère les informations de l'utilisateur
        ob_start();
        ?>
        <h1>Bienvenue <?= $user['NOM_TR'] ?> !</h1>
        <br>


        <?php
        (new ViewLayout($user['NOM_TR'], ob_get_clean()))->show(); // On affiche le formulaire en plus du layout.
    }
}