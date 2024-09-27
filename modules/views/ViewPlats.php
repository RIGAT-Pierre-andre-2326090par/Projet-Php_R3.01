<?php

namespace views;

class ViewPlats{
    public function show($plats, $page, $pagemax): void {
        ob_start();
        ?>
        <h2>De superbes plats</h2>
        <p>Découvrez nos plats sensationnels</p>

        <div class="liste">
        <?php foreach ($plats as $plat) { ?>
            <a href="/index.php?action=plat&nom=<?= urlencode($plat->getNom()); ?>">
                <section class="infoClub">
                    <img src="<?= htmlspecialchars('/_assets/images/plat/' . $plat->getImage()); ?>" alt="<?= htmlspecialchars($plat->getNom()); ?>" style="max-width: 200px; height: auto;" />
                    <div>
                        <h3><?= htmlspecialchars($plat->getNom()); ?></h3>
                        <p><?= htmlspecialchars($plat->getDescription()); ?></p>
                    </div>
                </section>
            </a>
        <?php }?>
        </div>
        <ul>
            <?php for ($i = ($page-2 >= 0) ? ($page-2) : 0; ($i <= $page+2) && ($i <= $pagemax); $i++) { ?>
                <li><a href="<?php echo '/index.php?action=repas&page='.$i ?>"><?php echo $i ?></a></li>
            <?php } ?>
        </ul>
        <?php
        (new ViewLayout('Plats', ob_get_clean()))->show();
    }
}
?>