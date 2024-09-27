<?php

namespace views;

class ViewForgetPassword
{
    public function show(): void{
        ob_start();
        ?>
        <section class="formulaire"> <!-- On crée un formulaire afin de gérer la connexion à notre site -->
            <h2> Connexion </h2>
            <form method="POST" action="/index.php?action=forgetpassword"> <!-- La méthode POST nous permet de réobtenir les valeurs du formulaire -->
                <label for="email">Envoyez votre e-mail</label>
                <input type="email" id="email" name="email" required>
                <input type="submit" value="Envoyer le mail de réinitialisation du mot de passe."><br>
        </section>
        <a href="/index.php?action=login"><p>Retouner à la page de connexion</p></a>
        <?php
        (new ViewLayout('Mot de passe oublié', ob_get_clean()))->show(); // On affiche la page avec le titre 'Connexion'
    }

}
?>