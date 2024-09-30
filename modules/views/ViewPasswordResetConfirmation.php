<?php

namespace views;

class ViewPasswordResetConfirmation
{
    public function show():void{
        ob_start();
        ?>
    <section class="confirmation">
        <h2> Une demande de réinitialisation du mot de passe a été envoyée.</h2>
        <p> Veuillez consulter votre adresse email afin de vérifier que le mail ait été reçu</p>

    </section>
<?php
        (new ViewLayout('Confirmation de réinitialisation du mot de passe', ob_get_clean()))->show();
    }

}