<!doctype html>
<html lang="fr">
  <head>
  <title>Collaborateurs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
  </head>

<body  class="bg-pastel">
<?php

require_once ("fonctions/main.php");
alreadylogin();
head();
navbar();

collaborateur();


footer();

?>

<script>
//Fonction JS pour agrandir la photo de profil dans le tableau
function bigImg(x) {
    x.style.height = "100px";
    x.style.width = "100px";
    }
function normalImg(x) {
    x.style.height = "28px";
    x.style.width = "28px";
    }
</script>
</body>
</html>