<?php

namespace blog\views;

class repas
{
    public function show($repas): void {
        ob_start();
        ?>
        <h2>Les Repas</h2>
        <p>Car c'est bien de se réunir</p>

        <div class="liste">
            <?php foreach ($repas as $unrepas) { ?>
                <a href="/index.php?action=unrepas&id=<?= urlencode($unrepas->getIdrp()); ?>">
                    <section class="infoClub">
                        <img src="<?= htmlspecialchars('/_assets/images/plat/' . $unrepas->getImageplat()); ?>" alt="<?= htmlspecialchars($unrepas->getDates()); ?>" style="max-width: 200px; height: auto;" />
                        <div>
                            <h3><?= htmlspecialchars($unrepas->getDates()); ?></h3>
                            <p><?= htmlspecialchars($unrepas->getNomplat()); ?></p>
                            <p><?= htmlspecialchars($unrepas->getNomclub()); ?></p>
                        </div>
                        <img src="<?= htmlspecialchars('/_assets/images/club/' . $unrepas->getImageclub()); ?>" alt="<?= htmlspecialchars($unrepas->getNomclub()); ?>" style="max-width: 200px; height: auto;" />
                    </section>
                </a>
            <?php }?>
        </div>
        <?php
        (new layout('Les Repas', ob_get_clean()))->show();
    }
}
?>