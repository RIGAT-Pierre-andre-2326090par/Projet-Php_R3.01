<?php

namespace views;

class ViewError
{
    /**
     * renvoie la page d'erreur
     * @param string $erreur: le message d'erreur
     * @return void
     */
    public function show(string $erreur):void{
        ob_start();
        ?>
        <?php echo $erreur;?> <!-- Page servant à la gestion d'erreur, en cas de page non affichée. -->
        <?php
        (new ViewLayout('Erreur', ob_get_clean()))->show();
    }


}
?>