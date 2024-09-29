<?php

namespace views;

class ViewUnRepas
{
    public function __construct(){}

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
                        <img alt="<? htmlspecialchars($repas->getNom()); ?>" id="platimg" <?= htmlspecialchars($repas->getNom()); ?> src="<?php echo '/_assets/images/plat/' . $imageplat ?>">
                        <img id="clubimg" alt="Images d'un plat" src="<?php echo '/_assets/images/club/' . $imageclub ?>">
                    </section>
                </section>
                <section id="right">
                    <p id="club"><?php echo $nomclub ?></p>
                    <h3 id="plat"><?php echo $nomplat ?></h3>
                </section>
            </section>
            <section id="bottomSide">
                <form action="/index.php?action=gestionRepas&id=<?= $id ?>" method="POST">
                    <button type="submit" class="modif">Modifier Repas</button>
                </form>
                <form action="/index.php?action=repassupprime&id=<?= $id ?>" method="POST">
                    <button type="submit" name="deleteBouton" class="delete">Supprimer Repas</button>
                </form>
                <p id=""> <!--a voir--></p>
            </section>
        </section>
        <?php
        (new ViewLayout('Repas', ob_get_clean()))->show();}
}
