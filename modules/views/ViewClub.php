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
            <section>

            </section>
        <img src="<?php echo '/_assets/images/club/' . $image ?>" />
        <h2><?php echo  $nom ?></h2>
        <h4><?php echo  $adr ?></h4>
        <p> <?php echo  $description ?></p>
        <button action="/index.php?action=gestionClub&id=<?= $id ?>" class="modif">Modifier Club</button>
        <form action="/index.php?action=clubsupprime" method="POST">
            <button class="delete" type="submit" name="deleteBouton">Supprimer Club</button>
        </form>
        <strong>Photos</strong>
        <img src="#" />
        <strong>Membres</strong>
        <img src="#" />
        <?php
        (new ViewLayout('Club', ob_get_clean()))->show();
    }

}