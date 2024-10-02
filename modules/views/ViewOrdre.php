<?php

namespace views;

class ViewOrdre
{
    /**
     * renvoie la page de l'ordre
     * @param $clubs: liste des clubs
     * @param $page: page actuelle
     * @param $pagemax: nombre de pages
     * @return void
     */
    public function show($clubs, $page, $pagemax):void{
        ?>

        <h1>Ordre</h1>

        <p>L'Ordre des Tenrac est né dans les montagnes de Savoie au XIVe siècle, lorsque Mickael, un jeune berger, découvrit par hasard l'association parfaite entre tenders de poulet et raclette. Coincé dans un col enneigé, il fit fondre de la raclette sur des morceaux de poulet grillé, créant une fusion si délicieuse qu'elle donna force et espoir à ses compagnons. Cette recette devint rapidement légendaire dans la région.

            Mickael fonda alors une confrérie dédiée à ce plat unique, l'Ordre des Tenrac, qui rassemblait les amateurs de cette combinaison divine. Au fil des siècles, l'Ordre grandit, instaurant des rites, des grades, et des banquets sacrés pour honorer l’union entre le croustillant du poulet et le fondant de la raclette.
        </p>

        <div class="titrePartie">
            <h2>Clubs</h2>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a class="btn" href="/index.php?action=ajoutClub">Ajouter un Club</a>
            <?php endif ?>
        </div>

        <div class="liste">
            <?php foreach ($clubs as $club) { ?>
                <a href="/index.php?action=club&id=<?= urlencode($club->getId()); ?>">
                    <section class="infoClub">
                        <img src="<?= htmlspecialchars('/_assets/images/club/' . $club->getImage()); ?>" alt="<?= htmlspecialchars($club->getAdresse()); ?>" style="max-width: 200px; height: auto;" />
                        <div>
                            <h3><em><?= htmlspecialchars($club->getNom()); ?></em></h3>
                            <p><em><?= htmlspecialchars($club->getAdresse()); ?></em></p>
                        </div>
                    </section>
                </a>
            <?php }?>
        </div>
        <ul>
            <?php for ($i = ($page-2 >= 0) ? ($page-2) : 0; ($i <= $page+2) && ($i <= $pagemax); $i++) { ?>
                <li><a href="<?php echo '/index.php?action=ordre&page='.$i ?>"><?php echo $i+1 ?></a></li>
            <?php } ?>
        </ul>
        <?php
        (new ViewLayout('Ordre et clubs', ob_get_clean()))->show();
    }
}
?>