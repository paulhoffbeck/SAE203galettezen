<!doctype html>
<html lang="fr">
  <head>
  <title>traitement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
  </head>

<body  class="bg-pastel">


<?php

require_once ("fonctions/main.php");
head();
navbar();


?>
  <br><br><br><br><br><br><br><br><br><br><br>

<?php


var_dump($_POST);
var_dump($_SESSION);

?>
<?php

footer();

?>

</body>
</html>