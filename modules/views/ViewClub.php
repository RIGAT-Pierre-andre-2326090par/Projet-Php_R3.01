<?php

namespace views;

use models\ModelClub;
use models\ModelTenrac;

class ViewClub
{
    /**
     * renvoie la page du club
     * @param $club: tableau associatif contenant les informations du club
     * @return void
     */
    public function show($club, $membres): void {
        $id=$club['ID_CL'];
        $nom=$club['NOM_CL'];
        $adr=$club['ADRESSE_CL'];
        $description=$club['DESC_CL'];
        $image=$club['IMG_CL'];
        ob_start();
        ?>
        <section>
            <section id="topSide">
                <section id="leftside">
                    <img class="img_membre" alt="<? echo htmlspecialchars($nom); ?>" src="<?php echo '/_assets/images/club/' . $image ?>" />
                </section>
                <section id="right">
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
                </section>
            </section>
            <section>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <h3>Membres : </h3>
                <section>
                    <?php foreach ($membres as $membre) { ?>
                        <section class="infoMembreClub">
                            <img src="<?php echo '/_assets/images/membre/' . $membre->getImage() ?>" alt="<?= htmlspecialchars($membre->getNom()); ?>">
                            <div>
                                <h3><?= htmlspecialchars($membre->getNom()); ?></h3>
                                <p> Grade : <?= htmlspecialchars($membre->getGrade()); ?></p>
                                <p><?= htmlspecialchars($membre->getCourriel()); ?></p>
                                <p><?= htmlspecialchars($membre->getTelephone()); ?></p>
                                <p><?= htmlspecialchars($membre->getAdresse()); ?></p>
                            </div>
                        </section>
                    <?php }?>
                </section>
            </section>
                <?php endif ?>
        </section>


        <?php
        (new ViewLayout('Club', ob_get_clean()))->show();
    }

}