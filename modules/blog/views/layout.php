<?php
namespace blog\views;
class Layout // La classe Layout nous permet de poser la base de nos pages HTML
{
  public function __construct(private string $title, private string $content){} // On définit notre constructeur
  public function show():void{ // Création de la fonction show, qui permet d'afficher le contenu de la page

  ?>
<!DOCTYPE html>  <!-- Structure basique de HTML, qui se retrouvera sur toutes les pages -->
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= $this->title; ?></title> <!-- Prend la valeur de $title -->
    <link href="../../../_assets/styles/light-style.css" rel="stylesheet"/> <!-- Lien jusqu'au CSS -->
</head>
<body>
<header>
    


</header>
<?= $this->content; ?> <!-- Contenu de la page, avec $content-->

</body>

</html>
<?php
  }


}
?>