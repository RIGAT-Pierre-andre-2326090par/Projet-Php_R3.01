<?php
namespace views;

class ViewHomepage {
    /**
     * renvoie la page d'accueil
     * @param $plats: array
     * @param $clubs: array
     * @return void
     */
    public function show($plats, $clubs): void {
        ob_start();
        ?>
        <section class="hautdepage">
            <h1>Bienvenue sur Tenrac-Lovers</h1>
            <p>Découvre une myriade de plats plus gras les uns que les autres !</p>
        </section>
        <div class="titrePartie">
            <h2>De superbes plats</h2>
            <a class="btn" href="/index.php?action=plats">Voir plus</a>
        </div>
        <div class="listeHome">
        <?php foreach ($plats as $plat) { ?>
            <a href="/index.php?action=plat&id=<?= urlencode($plat->getId()); ?>">
                <section class="platHome">
                    <img src="<?= htmlspecialchars('/_assets/images/plat/' . $plat->getImage()); ?>" alt="<?= htmlspecialchars($plat->getNom()); ?>">
                    <div>
                        <h3><?= htmlspecialchars($plat->getNom()); ?></h3>
                        <p><?= htmlspecialchars($plat->getDescription()); ?></p>
                    </div>
                </section>
            </a>
        <?php }?>
        </div>
        <div class="titrePartie">
            <h2>Des clubs à votre portée</h2>
            <a class="btn" href="/index.php?action=ordre"> Voir plus </a>
        </div>
        <div class="listeHome">
        <?php foreach ($clubs as $club) { ?>
            <a href="/index.php?action=club&id=<?= urlencode($club->getId()); ?>">
                <section class="infoClubHome">
                    <img src="<?= htmlspecialchars('/_assets/images/club/' . $club->getImage()); ?>" alt="<?= htmlspecialchars($club->getNom()); ?>">
                    <div>
                        <h3><?= htmlspecialchars($club->getNom()); ?></h3>
                        <p><?= htmlspecialchars($club->getAdresse()); ?></p>
                    </div>
                </section>
            </a>
        <?php }?>
        </div>
        <?php
        (new ViewLayout('Accueil', ob_get_clean()))->show();
    }
}
?>