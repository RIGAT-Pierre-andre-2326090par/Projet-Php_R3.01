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
    public function show($repas):void{
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
                        <img alt="<? htmlspecialchars($dates); ?>" id="platimg" <?= htmlspecialchars($dates); ?> src="<?php echo '/_assets/images/plat/' . $imageplat ?>">
                        <img id="clubimg" alt="Images d'un plat" src="<?php echo '/_assets/images/club/' . $imageclub ?>">
                    </section>
                </section>
                <section id="right">
                    <p id="club"><?php echo $nomclub ?></p>
                    <h3 id="plat"><?php echo $nomplat ?></h3>
                </section>
            </section>
            <section id="bottomSide">
                <form action="/index.php?action=gestionRepas&id=<?= $idrp ?>" method="POST">
                    <button type="submit" class="modif">Modifier Repas</button>
                </form>
                <form action="/index.php?action=repassupprime&id=<?= $idrp ?>" method="POST">
                    <button type="submit" name="deleteBouton" class="delete">Supprimer Repas</button>
                </form>
                <p id=""> <!--a voir--></p>
            </section>
        </section>
        <?php
        (new ViewLayout('Repas', ob_get_clean()))->show();}
}
