<?php

namespace views;

class ViewPlats{
    /**
     * renvoie la page des plats
     * @param $plats: array
     * @param $page: int
     * @param $pagemax: int
     * @return void
     */
    public function show($plats, $page, $pagemax): void {
        ob_start();
        ?>
        <h2>De superbes plats</h2>
        <p>Découvrez nos plats sensationnels</p>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a class="btn" href="/index.php?action=ajoutPlat">Ajouter un Plat</a>
        <?php endif; ?>
        <div class="liste">
            <?php foreach ($plats as $plat) { ?>
                <a href="/index.php?action=plat&id=<?= urlencode($plat->getId()); ?>">
                    <section class="infoClub">
                        <img src="<?= htmlspecialchars('/_assets/images/plat/' . $plat->getImage()); ?>" alt="<?= htmlspecialchars($plat->getNom()); ?>"/>
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
                <li><a href="<?php echo '/index.php?action=plats&page='.$i ?>"><?php echo $i+1 ?></a></li>
            <?php } ?>
        </ul>
        <?php
        (new ViewLayout('Plats', ob_get_clean()))->show();
    }
}
?>