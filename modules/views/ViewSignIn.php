<?php

namespace views;

class ViewSignIn
{
    function show(): void
    {
        ob_start();
        ?>
        <section class="formulaire">
            <h1>Créer un compte</h1>
            <br>
            <form action="/index.php?action=sign_in" method="post"> <!-- On crée un formulaire afin de récupérer les informations d'inscription -->
                <label for="nom">Nom</label>
                <input type="text" name="Nom" id="nom" required><br>
                <label for="password">Mot de Passe</label>
                <input type="password" name="Mot_de_Passe" id="password" required><br>
                <label for="adr">Adresse</label>
                <input type="text" name="Adresse" id="adr" required><br>
                <label for="email">Email</label>
                <input type="email" name="Email" id="email" required><br>
                <label for="tel">Téléphone</label>
                <input type="tel" name="Téléphone" id="tel" required><br>
                <input type="submit" id="sign_in" value="Soumettre">
            </form>
        </section>
        <a href="/index.php?action=login"><p>Retouner à la page de connexion</p></a> <!-- Retour à la page de connexion -->
        <?php
        (new ViewLayout('Inscription', ob_get_clean()))->show(); // On affiche le formulaire en plus du layout.
    }
}
