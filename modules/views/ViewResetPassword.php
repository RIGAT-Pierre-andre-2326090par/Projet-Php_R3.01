<?php

namespace views;

class ViewResetPassword
{
    /**
     * renvoie la page de réinitialisation du mot de passe
     * @return void
     */
    public function show(): void{
        ob_start();
        ?>
        <section class="formulaire"> <!-- On crée un formulaire afin de gérer la connexion à notre site -->
            <h2> Connexion </h2>
            <form method="POST" action="/index.php?action=forgetpassword"> <!-- La méthode POST nous permet de réobtenir les valeurs du formulaire -->
                <label for="newMDP">Nouveau mot de passe</label>
                <input type="password" id="newMDP" name="newMDP" required>
                <label for="confirmMDP">Confirmer le nouveau mot de passe</label>
                <input type="password" id="confirmMDP" name="confirmMDP" required>
                <input type="submit" value="Valider"><br>
        </section><!-- Une possibilité de retourner à la page de connexion -->
        <?php
        (new ViewLayout('Mot de passe oublié', ob_get_clean()))->show(); // On affiche la page avec le titre 'Connexion'
    }

}
?>