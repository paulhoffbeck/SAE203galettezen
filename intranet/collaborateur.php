<!doctype html>
<html lang="fr">
  <head>
    <title>Collaborateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

<body  class="bg-pastel">
<style>
.profile-img {
    height: 28px;
    width: 28px;
    transition: height 0.3s ease, width 0.3s ease;
}
</style>
<?php

require_once ("fonctions/main.php");
hasPermission("general","page-collaborateur",true);
alreadylogin();
head();
navbar();

collaborateur();


footer();

?>
<script type="text/javascript">
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