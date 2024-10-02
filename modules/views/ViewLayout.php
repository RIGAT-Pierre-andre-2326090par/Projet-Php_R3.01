<?php
namespace views;

class ViewLayout // La classe Layout nous permet de poser la base de nos pages HTML
{
    /**
     * constructeur de la classe ViewLayout
     * @param string $title: titre de la page
     * @param string $content: contenu de la page
     */
    public function __construct(private string $title, private string $content){} // On définit notre constructeur

    /**
     * renvoie la page
     * @return void
     */
    public function show():void{ // Création de la fonction show, qui permet d'afficher le contenu de la page
        ?>
        <!DOCTYPE html>  <!-- Structure basique de HTML, qui se retrouvera sur toutes les pages -->
        <html lang="fr">
        <head>
            <meta charset="utf-8"/>
            <title><?= $this->title; ?> - Tenrac Lovers</title> <!-- Prend la valeur de $title -->
            <link href="/_assets/styles/style.css" rel="stylesheet"/> <!-- Lien jusqu'au CSS -->
            <meta name="author" content="Théo, Mathéo, Baptiste, Estelle, Pierre-André, Cyril">
            <meta name="description" content="TenracLovers - Découvre une myriade de plats plus gras les uns que les autres !">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="/_assets/images/favicon.ico">
            <link rel="icon" type="image/png" href="/_assets/images/logo.webp"> <!-- On insère l'icone du site -->
            <script type="text/javascript" src="/_assets/scripts/script.js"></script>
        </head>
        <body>
        <header>
            <div>
                <img src="/_assets/images/icons/hamburgermenu.webp" alt="Ouverture du Menu" id="boutonmenu">
                <img src="/_assets/images/logo.webp" alt="Logo du site">
            </div>
            <div class="menu">
                <nav class="bandeau">
                    <!-- On crée notre bandeau de navigation -->
                    <ul>
                        <li>
                            <a href="/index.php?action=accueil"> Accueil </a>
                        </li>
                        <li>
                            <a href="/index.php?action=plats"> Plats </a>
                        </li>
                        <li>
                            <a href="/index.php?action=ordre"> Structure </a>
                        </li>
                        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                            <li><a href="/index.php?action=repas">Repas</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <nav class="bandeau">
                    <ul>
                        <li>
                            <form action="/index.php?action=recherche" method="GET">
                                <!-- Utilisation de la barre de recherche. -->
                                <input type="text" id="search" name="keyword" placeholder="Rechercher un plat..." required="">
                                <button name="action" value="recherche" type="submit"> Rechercher </button>
                            </form>
                        </li>
                        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                            <li><a href="/index.php?action=gestionTenrac">Profil</a></li>
                            <li><a href="/index.php?action=sign_in"> Ajouter Utilisateur </a></li>
                            <!-- <li><a href="/index.php?action=profilTenrac"> Se Déconnecter </a></li>-->
                        <?php else: ?> <!-- Sinon, pouvoir se déconnecter -->
                            <li><a href="/index.php?action=login"> Se Connecter </a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <?= $this->content; ?> <!-- Contenu de la page, avec $content-->
        </main>
        <footer> <!-- Notre footer contiendra la fin de la page, avec les réseaux et les informations importantes -->
            <hr>
            <section class="contact">
                <p>Contact</p>
                <p>Mentions légales</p>
                <p>Conditions générales d'utilisation</p>
            </section>
            <section class="reseaux"> <!-- On place nos icônes en bas de la page -->
                <a href=""><img src="/_assets/images/icons/facebook.webp" alt="Logo Facebook" /></a>
                <a href=""><img src="/_assets/images/icons/twitter.webp" alt="Logo Twitter" /></a>
                <a href=""><img src="/_assets/images/icons/instagram.webp" alt="Logo Instagram" /></a>
            </section>
            <p>Tenrac-Lovers© <?= date('Y'); ?> Tous droits réservés.</p> <!-- Ajout de l'année actuelle de manière dynamique -->
        </footer>
        </body>
        </html>
        <?php
    }
}
?>