<?php

namespace blog\views;

class error
{
    public function show(string $erreur):void{
        ?>
        <?php echo $erreur;?>
        <?php
        (new layout('Erreur', ob_get_clean()))->show();
    }


}
?>