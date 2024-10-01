<?php

namespace views;

class ViewRecherche
{
    /**
     * renvoie la page de recherche
     * @param $search: string
     * @param $plats_searched: array
     * @return void
     */
    public function show($search, $plats_searched): void {
        ob_start();
        ?>
        <h3> Résultats de recherche :</h3>
        <div class="liste">
            <?php foreach ($plats_searched as $plat) { ?>
                <a href="/index.php?action=plat&id=<?= urlencode($plat->getId()); ?>">
                    <section class="plat">
                        <img alt="<?= htmlspecialchars($plat->getNom()); ?>" src="<?= htmlspecialchars('/_assets/images/plat/' . $plat->getImage()); ?>">
                        <div>
                            <h3><?= htmlspecialchars($plat->getNom()); ?></h3>
                            <p><?= htmlspecialchars($plat->getDescription()); ?></p>
                        </div>
                    </section>
                </a>
            <?php }?>
        </div>
        <?php
        (new ViewLayout('Résultats de la recherche ' . $search, ob_get_clean()))->show();
    }
}
?>