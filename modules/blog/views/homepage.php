<?php
namespace blog\views;
class homepage {
    public function show($plats, $clubs): void {
        ob_start();
        ?>
        <section class="hautdepage">
            <h1>Bienvenue sur Tenrac-Lovers TEST3</h1>
            <p>Découvre une myriade de plats plus gras les uns que les autres !</p>
        </section>
        <h2>De superbes plats</h2>
        <div class="liste">
        <?php foreach ($plats as $plat) { ?>
            <a href="/index.php?action=plat&nom=<?= urlencode($plat->getNom()); ?>">
                <section class="plat">
                    <img src="<?= htmlspecialchars('/_assets/images/plat/' . $plat->getImage()); ?>">
                    <div>
                        <h3><?= htmlspecialchars($plat->getNom()); ?></h3>
                        <p><?= htmlspecialchars($plat->getDescription()); ?></p>
                    </div>
                </section>
            </a>
        <?php }?>
        </div>
        <a href="/index.php?action=plats"> Voir plus </a>
        <h2>Des clubs a votre portée</h2>
        <div class="liste">
        <?php foreach ($clubs as $club) { ?>
            <a href="/index.php?action=club&id=<?= urlencode($club->getId()); ?>">
                <section class="infoClub">
                    <img src="<?= htmlspecialchars('/_assets/images/club/' . $club->getImage()); ?>">
                    <div>
                        <h3><?= htmlspecialchars($club->getNom()); ?></h3>
                        <p><?= htmlspecialchars($club->getAdresse()); ?></p>
                    </div>
                </section>
            </a>
        <?php }?>
        </div>
        <a href="/index.php?action=ordre"> Voir plus </a>
        <?php
        (new layout('Accueil', ob_get_clean()))->show();
    }
}
?>