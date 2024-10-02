<?php

namespace views;

class ViewSignIn
{
    /**
     * renvoie la page d'inscription
     * @param $clubs
     * @return void
     */
    function show($clubs): void
    {
        ob_start();
        ?>
        <section class="formulaire">
            <h1>Créer un compte</h1>
            <br>
            <form action="/index.php?action=usercree" method="post"> <!-- On crée un formulaire afin de récupérer les informations d'inscription -->
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
                <label for="grade">Grade</label>
                <select name="grade" id="grade" required>
                    <option value="">--Veuillez choisir un grade--</option>
                    <option value="affilie">Affilié</option>
                    <option value="sympathisant">Sympathisant</option>
                    <option value="adherent">Adhérent</option>
                    <option value="chevalier">Chevalier</option>
                    <option value="dame">Dame</option>
                    <option value="grand_chevalier">Grand Chevalier</option>
                    <option value="haute_dame">Haute Dame</option>
                    <option value="commandeur">Commandeur</option>
                    <option value="grand_croix">Grand’Croix</option>
                </select>
                <br>
                <label for="rang">Rang</label>
                <select name="rang" id="rang">
                    <option value="">--Aucun rang--</option>
                    <option value="novice">Novice</option>
                    <option value="compagnon">Compagnon</option>
                </select>
                <br>
                <label for="titre">Titre</label>
                <select name="titre" id="titre">
                    <option value="">--Aucun titre--</option>
                    <option value="philanthrope">Philanthrope</option>
                    <option value="protecteur">Protecteur</option>
                    <option value="honorable">Honorable</option>
                </select>
                <br>
                <label for="dignite">Dignité</label>
                <select name="dignite" id="dignite">
                    <option value="">--Aucune dignité--</option>
                    <option value="maitre">Maître</option>
                    <option value="grand_chancelier">Grand Chancelier</option>
                    <option value="grand_maitre">Grand Maître</option>
                </select>
                <br>
                <label for="club">Club :</label>
                <select name="club" id="club" required>
                    <option value=""> -- Choisissez un club --</option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['ID_CL'] ?>"><?= $club['NOM_CL'] ?></option>
                    <?php endforeach; ?>
                </select><br>
                <input type="submit" id="sign_in" value="Soumettre">
            </form>
        </section>
        <?php
        (new ViewLayout('Inscription', ob_get_clean()))->show(); // On affiche le formulaire en plus du layout.
    }
}
