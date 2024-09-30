<?php

namespace views;

class ViewPasswordResetConfirmation
{
    public function show($status = null): void
    {
        ob_start();
        ?>
        <section class="confirmation">
            <h2>Une demande de réinitialisation du mot de passe a été envoyée.</h2>
            <p>Veuillez consulter votre adresse email afin de vérifier que le mail ait été reçu.</p>
            <?php if ($status === 'failure'): ?>
                <p style="color: red;">Erreur lors de l'envoi du mail. Veuillez réessayer.</p>
            <?php elseif ($status === 'success'): ?>
                <p style="color: green;">Un mail de réinitialisation a été envoyé avec succès.</p>
            <?php endif; ?>
        </section>
        <?php
        (new ViewLayout('Confirmation de réinitialisation du mot de passe', ob_get_clean()))->show();
    }
}
