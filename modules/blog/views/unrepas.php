<?php

namespace blog\views;

class unrepas
{
    public function __construct(){}

    public function show($repas):void{
        $dates = $repas['dates'];
        $idrp = $repas['idrp'];
        $idcl = $repas['idcl'];
        $idpl = $repas['idpl'];
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
                        <img id="platimg" src="<?php echo '/_assets/images/plat/' . $imageplat ?>">
                        <img id="clubimg" src="<?php echo '/_assets/images/club/' . $imageclub ?>">
                    </section>
                </section>
                <section id="right">
                    <p id="club"><?php echo $nomclub ?></p>
                    <h3 id="plat"><?php echo $nomplat ?></h3>
                </section>
            </section>
            <section id="bottomSide">
                <p id=""> <!--a voir--></p>
            </section>
        </section>
        <?php
        (new layout('plat', ob_get_clean()))->show();}
}
