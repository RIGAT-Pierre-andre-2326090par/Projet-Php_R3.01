<?php

namespace blog\views;

class login
{
    public function show(){
        ob_start();
        ?>
        <section class="formulaire">
        <h2> Connexion </h2>
        <form method="POST" action="index.php?action=login">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Se connecter">
        </section>
        </form>
<?php
        (new layout('Connexion', ob_get_clean()))->show();
    }

}
?>