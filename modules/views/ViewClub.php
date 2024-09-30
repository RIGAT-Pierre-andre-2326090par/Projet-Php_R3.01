<?php

namespace views;

class ViewClub
{
    public function show($club): void {
        $id=$club['ID_CL'];
        $nom=$club['NOM_CL'];
        $adr=$club['ADRESSE_CL'];
        $description=$club['DESC_CL'];
        $image=$club['IMG_CL'];
        ob_start();
        ?>
        <img alt="<? echo htmlspecialchars($nom); ?>" src="<?php echo '/_assets/images/club/' . $image ?>" />
        <h2><?php echo  $nom ?></h2>
        <h4><?php echo  $adr ?></h4>
        <p> <?php echo  $description ?></p>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <form action="/index.php?action=gestionClub&id=<?= $id ?>" method="POST">
                <button type="submit" class="modif">Modifier Club</button>
            </form>
            <form action="/index.php?action=clubsupprime&id=<?= $id ?>" method="POST">
                <button type="submit" name="deleteBouton" class="delete">Supprimer Club</button>
            </form>
        <?php endif ?>
        <strong>Photos</strong>
        <img src="#" alt="<?= $nom ?>"/>
        <strong>Membres</strong>
        <img src="#" />
        <?php
        (new ViewLayout('Club', ob_get_clean()))->show();
    }

}