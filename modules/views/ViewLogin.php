<?php

namespace views;

class ViewLogin
{
    public function show(): void{
        ob_start();
        ?>
        <section class="formulaire"> <!-- On crée un formulaire afin de gérer la connexion à notre site -->
        <h2> Connexion </h2>
        <form method="POST" action="/index.php?action=login"> <!-- La méthode POST nous permet de réobtenir les valeurs du formulaire -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Se connecter"><br>
        </section>
        <!-- Redirige vers d'autres pages en rapport avec la connexion -->
        <p><a href="/index.php?action=forget">Mot de passe oublié ?</a></p>
        <p><a href="/index.php?action=sign_in">S'inscrire ?</a></p>
        <?php
        (new ViewLayout('Connexion', ob_get_clean()))->show(); // On affiche la page avec le titre 'Connexion'
    }

}
?>