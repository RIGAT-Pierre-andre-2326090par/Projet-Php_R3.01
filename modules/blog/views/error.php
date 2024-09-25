<?php

namespace blog\views;

class error
{
    public function show(string $erreur):void{
        ob_start();
        ?>
        <?php echo $erreur;?> <!-- Page servant à la gestion d'erreur, en cas de page non affichée. -->
        <?php
        (new layout('Erreur', ob_get_clean()))->show();
    }


}
?>