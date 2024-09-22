<?php

namespace blog\views;

class plats{
    public function show($plats): void {
        ob_start();
        ?>
        <h2>De superbes plats</h2>
        <p>Découvrez nos plats sensationnels</p>

        <?php foreach ($plats as $plat) { ?>
            <section class="infoClub">
                <img src="<?= htmlspecialchars($plat->getImage()); ?>" alt="<?= htmlspecialchars($plat->getName()); ?>" style="max-width: 200px; height: auto;" />
                <h3><?= htmlspecialchars($plat->getName()); ?></h3>
                <p><?= htmlspecialchars($plat->getDesc()); ?></p>
            </section>

        <?php
        (new layout('Plats', ob_get_clean()))->show();
    }}
}
?>