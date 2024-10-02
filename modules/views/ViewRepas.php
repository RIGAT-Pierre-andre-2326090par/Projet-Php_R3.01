<?php

namespace views;

class ViewRepas
{
    /**
     * renvoie la page d'un repas
     * @param $repas: array
     * @param $page: int
     * @param $pagemax: int
     * @return void
     */
    public function show($repas, $page, $pagemax): void {
        ob_start();
        ?>
        <h2>Les Repas</h2>
        <p>Car c'est bien de se réunir</p>
        <a class="btn" href="/index.php?action=ajoutRepas">Ajouter un Repas</a>

        <div class="liste">
            <?php foreach ($repas as $unrepas) { ?>
                <a href="/index.php?action=unrepas&id=<?= urlencode($unrepas->getIdrp()); ?>">
                    <section class="infoClub">
                        <img src="<?= htmlspecialchars('/_assets/images/plat/' . $unrepas->getImageplat()); ?>" alt="<?= htmlspecialchars($unrepas->getDates()); ?>"/>
                        <div>
                            <h3><?= htmlspecialchars($unrepas->getDates()); ?></h3>
                            <p><?= htmlspecialchars($unrepas->getNomplat() ?? ""); ?></p>
                            <p><?= htmlspecialchars($unrepas->getNomclub() ?? ""); ?></p>
                        </div>
                        <img src="<?= htmlspecialchars('/_assets/images/club/' . $unrepas->getImageclub()); ?>" alt="<?= htmlspecialchars($unrepas->getNomclub()); ?>"/>
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
        (new ViewLayout('Les Repas', ob_get_clean()))->show();
    }
}
?>