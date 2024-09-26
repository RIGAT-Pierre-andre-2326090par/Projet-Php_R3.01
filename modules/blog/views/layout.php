<?php
namespace blog\views;
class layout // La classe Layout nous permet de poser la base de nos pages HTML
{
  public function __construct(private string $title, private string $content){} // On définit notre constructeur
  public function show():void{ // Création de la fonction show, qui permet d'afficher le contenu de la page
  ?>
<!DOCTYPE html>  <!-- Structure basique de HTML, qui se retrouvera sur toutes les pages -->
<html lang="fr">
      <head>
          <meta charset="utf-8"/>
          <title><?= $this->title; ?></title> <!-- Prend la valeur de $title -->
          <link href="/_assets/styles/style.css" rel="stylesheet"/> <!-- Lien jusqu'au CSS -->
          <meta name="author" content="Théo, Mathéo, Baptiste, Estelle, Pierre-André, Cyril">
          <meta name="description" content="Découvre une myriade de plats plus gras les uns que les autres !">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" href="/_assets/images/favicon.ico">
          <link rel="icon" type="image/png" href="/_assets/images/logo.webp">
      </head>
      <body>
      <header>
            <nav class="bandeau"> <!-- On crée notre bandeau de navigation -->
                <ul>
                    <li><a href="/index.php?action=accueil"> Accueil </a> </li>
                    <li><a href="/index.php?action=plats"> Plats </a></li>
                    <li><a href="/index.php?action=ordre"> Ordre et clubs </a></li>
                    <li><a href="/index.php?action=login"> Se Connecter </a></li>
                    <li><a href="/index.php?action=sign_in"> S'Inscrire </a></li>
                </ul>
            </nav>
            <img src="/_assets/images/logo.webp"/>
      </header>
      <main>
          <?= $this->content; ?> <!-- Contenu de la page, avec $content-->
      </main>
      <footer> <!-- Notre footer contiendra la fin de la page, avec les réseaux et les informations importantes -->
          <hr>
          <section class="contact">
              <p>Contact</p>
              <p>Mentions légales</p>
              <p>Conditions générales d'utilisations</p>
          </section>
          <section class="reseaux">
              <a href=""><img src="/_assets/images/icons/facebook.webp" /></a>
              <a href=""><img src="/_assets/images/icons/twitter.webp" /></a>
              <a href=""><img src="/_assets/images/icons/instagram.webp" /></a>
          </section>
          <p>Tenrac-Lovers© <?php date('Y'); ?></p> <!-- Ajout de l'année actuelle de manière dynamique -->
      </footer>
      </body>
</html>
<?php
  }
}
?>