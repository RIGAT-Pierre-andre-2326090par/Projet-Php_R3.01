<?php

namespace blog\views;

class sign_in
{
    function show(): void
    {
        ob_start();
        ?>
        <h1>Créer un compte</h1>
        <form action="../controllers/sign_in.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" name="Nom" id="nom" required>
            <label for="pwd">Mot de Passe :</label>
            <input type="password" name="Mot de Passe" id="pwd" required>
            <label for="adr">Adresse :</label>
            <input type="text" name="Adresse" id="adr" required>
            <label for="mail">Email :</label>
            <input type="email" name="Email" id="mail" required>
            <label for="tel">Téléphone :</label>
            <input type="tel" name="Téléphone" id="tel" required>
            <input type="submit" value="sign_in">
        </form>
        <?php
        (new layout('Inscription', ob_get_clean()))->show();
    }
}
