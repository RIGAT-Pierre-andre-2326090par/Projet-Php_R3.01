<?php

namespace views;

class ViewGestionTenrac
{
    /**
     * renvoie la page de gestion du tenrac
     * @param $tenrac: array
     * @return void
     */
    public function show($tenrac): void {
        ob_start();
        ?>
        <section class="formulaire">
            <form action="/index.php?action=tenracmodifie" method="POST">
                <label for="nomTenrac">Nom :</label>
                <input type="text" name="nomTenrac" id="nomTenrac" required value="<?= htmlspecialchars($tenrac['NOM_TR']) ?>"><br>
                <label for="mdpTenrac">Mot de passe :</label>
                <input type="password" name="mdpTenrac" id="mdpTenrac" required><br>
                <label for="adrTenrac">Adresse :</label>
                <input type="text" name="adrTenrac" id="adrTenrac" required value="<?= htmlspecialchars($tenrac['ADRESSE_TR']) ?>"><br>
                <label for="courrielTenrac">Courriel :</label>
                <input type="email" name="courrielTenrac" id="courrielTenrac" required value="<?= htmlspecialchars($tenrac['COURRIEL_TR']) ?>"><br>
                <label for="telephoneTenrac">Téléphone :</label>
                <input type="number" name="telephoneTenrac" id="telephoneTenrac" required value="<?= htmlspecialchars($tenrac['TELEPHONE_TR']) ?>"><br>
                <label for="gradeTenrac">Grade :</label>
                <select name="gradeTenrac" id="gradeTenrac" required>
                    <option value=""> -- Choisissez un grade --</option>
                    <option value="affilie" <?= $tenrac['GRADE_TR'] === 'Affilie' ? 'selected' : '' ?>>Affilié</option>
                    <option value="sympathisant" <?= $tenrac['GRADE_TR'] === 'Sympathisant' ? 'selected' : '' ?>>Sympathisant</option>
                    <option value="adherent" <?= $tenrac['GRADE_TR'] === 'Adherent' ? 'selected' : '' ?>>Adhérent</option>
                    <option value="chevalier" <?= $tenrac['GRADE_TR'] === 'Chevalier' ? 'selected' : '' ?>>Chevalier</option>
                    <option value="dame" <?= $tenrac['GRADE_TR'] === 'Dame' ? 'selected' : '' ?>>Dame</option>
                    <option value="grandChevalier" <?= $tenrac['GRADE_TR'] === 'Grand Chevalier' ? 'selected' : '' ?>>Grand Chevalier</option>
                </select><br>

                <label for="rangTenrac">Rang :</label>
                <select name="rangTenrac" id="rangTenrac">
                    <option value=""> -- Choisissez un rang --</option>
                    <option value="novice" <?= $tenrac['RANG_TR'] === 'Novice' ? 'selected' : '' ?>>Novice</option>
                    <option value="compagnon" <?= $tenrac['RANG_TR'] === 'Compagnon' ? 'selected' : '' ?>>Compagnon</option>
                </select><br>

                <label for="titreTenrac">Titre :</label>
                <select name="titreTenrac" id="titreTenrac">
                    <option value=""> -- Choisissez un titre --</option>
                    <option value="philanthrope" <?= $tenrac['TITRE_TR'] === 'Philanthrope' ? 'selected' : '' ?>>Philanthrope</option>
                    <option value="protecteur" <?= $tenrac['TITRE_TR'] === 'Protecteur' ? 'selected' : '' ?>>Protecteur</option>
                    <option value="honorable" <?= $tenrac['TITRE_TR'] === 'Honorable' ? 'selected' : '' ?>>Honorable</option>
                </select><br>

                <label for="digniteTenrac">Dignité :</label>
                <select name="digniteTenrac" id="digniteTenrac">
                    <option value=""> -- Choisissez une dignité --</option>
                    <option value="maitre" <?= $tenrac['DIGNITE_TR'] === 'Maitre' ? 'selected' : '' ?>>Maître</option>
                    <option value="grandChancelier" <?= $tenrac['DIGNITE_TR'] === 'Grand Chancelier' ? 'selected' : '' ?>>Grand Chancelier</option>
                    <option value="grandMaître" <?= $tenrac['DIGNITE_TR'] === 'Grand Maitre' ? 'selected' : '' ?>>Grand Maître</option>
                </select><br>

                <button type="submit" name="modifBouton" class="modif">Modifier</button>
            </form>
        </section>
        <?php
        (new ViewLayout('Gestion Tenrac', ob_get_clean()))->show();
    }
}
