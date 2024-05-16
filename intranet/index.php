<!doctype html>
<html lang="fr">
  <head>
  <title>Acceuil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
  </head>

<body  class="bg-pastel">
<?php

require_once ("fonctions/main.php");

if(!isset($_SESSION["prenom"]) || !isset($_SESSION["nom"]) !==true){
  header('Location: connexion.php');
  exit;
}

head();
navbar();

echo'<br>';

footer();

?>

</body>
</html>