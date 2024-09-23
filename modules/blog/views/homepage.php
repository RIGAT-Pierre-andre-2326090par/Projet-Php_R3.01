<?php
namespace blog\views;
class homepage {
    public function show($plats, $clubs): void {
        ob_start();
        ?>
        <h1>Bienvenue sur Tenrac-Lovers TEST2</h1>
        <p>Découvre une myriade de plats plus gras les uns que les autres !</p>
        <h2>De superbes plats</h2>
        <?php foreach ($plats as $plat) { ?>
            <a href="">
                <section class="plat">
                    <div>
                        <h3><?= htmlspecialchars($plat->getNom()); ?></h3>
                        <p><?= htmlspecialchars($plat->getDescription()); ?></p>
                    </div>
                    <img src="<?= htmlspecialchars($plat->getImage()); ?>">
                </section>
            </a>
        <?php }?>
        <a>Voir plus</a>
        <h2>Des clubs a votre portée</h2>
        <?php foreach ($clubs as $club) { ?>
            <a href="">
                <section class="infoClub">
                    <div>
                        <h3><?= htmlspecialchars($club->getNom()); ?></h3>
                        <p><?= htmlspecialchars($club->getAdresse()); ?></p>
                    </div>
                    <img src="<?= htmlspecialchars($club->getImage()); ?>">
                </section>
            </a>
        <?php }?>
        <a>Voir plus</a>
        <?php
        (new layout('Accueil', ob_get_clean()))->show();
    }
}
?>