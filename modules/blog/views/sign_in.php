<?php

namespace blog\views;

class sign_in
{
    function show(): void
    {
        ob_start();
        ?>
        <h1>Créer un compte</h1>
        <br>
        <form action="/index.php?action=sign_in" method="post">
            <label for="nom">Nom :</label>
            <input type="text" name="Nom" id="nom" required><?= PHP_EOL; ?>
            <label for="pwd">Mot de Passe :</label>
            <input type="password" name="Mot de Passe" id="password" required><?= PHP_EOL; ?>
            <label for="adr">Adresse :</label>
            <input type="text" name="Adresse" id="adr" required><br>
            <label for="mail">Email :</label>
            <input type="email" name="Email" id="email" required><?= PHP_EOL; ?>
            <label for="tel">Téléphone :</label>
            <input type="tel" name="Téléphone" id="tel" required><?= PHP_EOL; ?>
            <input type="submit" id="sign_in" value="Soumettre">
        </form>
        <?php
        (new layout('Inscription', ob_get_clean()))->show();
    }
}
