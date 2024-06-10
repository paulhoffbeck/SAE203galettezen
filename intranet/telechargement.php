<!doctype html>
<html lang="fr">
  <head>
  <title>Clients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
  </head>

<body class="bg-pastel">

<?php
function telechargement($key){
    $json = file_get_contents('./database/clients.json');
    $donnee = json_decode($json, true);
    $user = $donnee[$key];

    echo'<p>
    nom ='.$user['nom'].'
    prenom ='.$user['prenom'].'
    date_de_naissance ='.$user['date_de_naissance'].'
    telephone ='.$user['telephone'].'
    email ='.$user['email'].'
    pays ='.$user['adresse']['pays'].'
    code_postal ='.$user['adresse']['code_postal'].'
    ville ='.$user['adresse']['ville'].'
    rue ='.$user['adresse']['rue'].'
    entreprise_ou_particuliers ='.$user['entreprise_ou_particuliers'].'
    langue ='.$user['langue'].'<p>';

    //<script>
    //window.print
}
telechargement($_GET['key']);

?>
</body>
</html>