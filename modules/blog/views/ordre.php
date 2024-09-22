<?php

namespace blog\views;

class ordre
{
    public function show($clubs):void{
        ?>

        <h1>Ordre</h1>

        <p>Description de dingo wow</p>

        <h3>Clubs</h3>

        <?php foreach ($clubs as $club) { ?>
            <section class="infoClub">
                <img src="<?= htmlspecialchars($club->getImage()); ?>" alt="<?= htmlspecialchars($club->getName()); ?>" style="max-width: 200px; height: auto;" />
                <h3><?= htmlspecialchars($club->getName()); ?><em></h3>
                <p><?= htmlspecialchars($club->getAddress()); ?><em></p>
            </section>
        <?php
        }
        (new layout('Ordre et clubs', ob_get_clean()))->show();
    }
}
?>