<?php

namespace views;

class ViewOrdre
{
    public function show($clubs):void{
        ?>

        <h1>Ordre</h1>

        <p>Dans l'univers des Tenracs, trois Ordres prestigieux veillent à la préservation et à la promotion de la culture fromagère, avec un accent particulier sur la raclette, un plat emblématique de la convivialité et du partage.
            Chacun de ces Ordres a ses propres valeurs, traditions et missions.</p>

        <h2>Clubs</h2>
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
        <?php
        (new ViewLayout('Ordre et clubs', ob_get_clean()))->show();
    }
}
?>