<!doctype html>
<html lang="fr">
  <head>
  <title>GaleteZen - Inscription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-pastel">


<?php
require_once('fonctions/main.php');
head();

echo "<main class\"flex-fill\">";
echo codeConfirmationFormulaire();
echo "</main>";
footer();
?>


</body>
</html>