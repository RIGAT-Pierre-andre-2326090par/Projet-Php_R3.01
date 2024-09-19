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
          <link href="../../../_assets/styles/style.css" rel="stylesheet"/> <!-- Lien jusqu'au CSS -->
      </head>
      <body>
      <nav>
          <ul>
            <li><a href="#">Plats</a></li>
            <li><a href="#">Clubs</a></li>
            <li><a href="#">Repas</a></li>
          </ul>


      </nav>
      <?= $this->content; ?> <!-- Contenu de la page, avec $content-->

      <footer>
          <hr>
          <section class="contact">
              <p>Contact</p>
              <p>Mentions légales</p>
              <p>Conditions générales d'utilisations</p>
          </section>

          <section class="reseaux">
              <img src="#" />
              <img src="#" />
              <img src="#" />
          </section>

          <p>Tenrac-Lovers©</p>

      </footer>
      </body>

</html>
<?php
  }


}
?>