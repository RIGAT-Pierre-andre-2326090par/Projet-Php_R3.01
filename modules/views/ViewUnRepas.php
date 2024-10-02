<?php

namespace views;

class ViewUnRepas
{
    /**
     * constructeur de la classe ViewUnRepas
     */
    public function __construct(){}

    /**
     * renvoie la page d'un repas
     * @param $repas: array
     * @return void
     */
    public function show($repas, $plats):void{
        $dates = $repas['dates'];
        $idrp = $repas['idrepas'];
        $idcl = $repas['idclub'];
        $nomclub = $repas['nomclub'];
        $imageclub = $repas['imageclub'];
        $nomplat = $repas['nomplat'];
        $imageplat = $repas['imageplat'];
        ob_start();
        ?>
        <section>
            <section id="topSide">
                <section id="leftside">
                    <section id="top">
                        <h2 id="dates"> <?php echo $dates ?> </h2>
                        <img alt="Images d'un plat"  id="platimg" <?= htmlspecialchars($dates); ?> src="<?php echo '/_assets/images/plat/' . $imageplat ?>">
                    </section>
                </section>
                <section id="right">
                    <p id="club"><?php echo $nomclub ?></p>
                    <img id="clubimg" alt="Images d'un club" src="<?php echo '/_assets/images/club/' . $imageclub ?>">
                </section>
            </section>
            <section id="bottomSide">
                <form action="/index.php?action=gestionRepas&id=<?= $idrp ?>" method="POST">
                    <button type="submit" class="modif">Modifier Repas</button>
                </form>
                <form action="/index.php?action=repassupprime&id=<?= $idrp ?>" method="POST">
                    <button type="submit" name="deleteBouton" class="delete">Supprimer Repas</button>
                </form>
                <h2>Plats</h2>
                <div class="liste">
                    <?php
                    if(count($plats) > 0) {
                        foreach ($plats as $plat) { ?>
                            <a href="/index.php?action=plat&id=<?= urlencode($plat->getId()); ?>">
                                <section class="infoClub">
                                    <img src="<?= htmlspecialchars('/_assets/images/plat/' . $plat->getImage()); ?>" alt="<?= htmlspecialchars($plat->getNom()); ?>" style="max-width: 200px; height: auto;" />
                                    <div>
                                        <h3><?= htmlspecialchars($plat->getNom()); ?></h3>
                                        <p><?= htmlspecialchars($plat->getDescription()); ?></p>
                                    </div>
                                </section>
                            </a>
                    <?php }
                    } else {
                        echo "Aucun plat.";
                    }?>
                </div>
            </section>
        </section>
        <?php
        (new ViewLayout('Repas', ob_get_clean()))->show();}
}
