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

$mail = $_POST["email"];
$domaine = explode("@",$mail)[1];

var_dump($domaine);

if ($domaine == "galetezen.com") {
  echo("l'adresse mail n'appartient pas au domaine de l'entrprise.");
}else{
  
  $to      = 'simoncollet2005@gmail.com';
  $subject = 'le sujet est super';
  $message = 'Bonjour !';
  $headers = 'From: simoncollet2005@gmail.com';

  mail($to, $subject, $message, $headers);

}

?>
<?php

footer();

?>

</body>
</html>