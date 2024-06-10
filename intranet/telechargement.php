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
echo '
    <h1 class="my-4 text-center">Fiche du client '. strtoupper($user['nom']). ' '. $user['prenom'].'</h1>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <tr>
          <th>Nom</th>
          <td>'. strtoupper($user['nom']).'</td>
        </tr>
        <tr>
          <th>Prénom</th>
          <td>'. $user['prenom'].'</td> 
        </tr>
        <tr>
          <th>Date de Naissance</th>
          <td>'. $user['date_de_naissance'].'</td>
        </tr>
        <tr>
          <th>Adresse Mail</th>
          <td><a href="mailto:'. $user['email'].'">'. $user['email'].'</td> 
        </tr>
        <tr>
          <th>Type de client</th>
          <td>'. $user['entreprise_ou_particuliers'].'</td> 
        </tr>
        <tr>
          <th>Téléphone</th>
          <td>'.$user['telephone'].'</td>
        </tr>
        <tr>
          <th>Pays</th>
          <td>'.$user['adresse']['pays'].'<br><small>'. $user['langue'].'</small></td
        </tr>
        <tr>
          <th>Ville</th>
          <td>'.$user['adresse']['ville'].', '.$user['adresse']['code_postal'].'<br><small>'. $user['adresse']['rue'].'</small></td>
        </tr>
    </table></div></div>';
  ?>
  <script>
  window.print()
  </script>
  <?php
  header("refresh:1;url=clients.php");
}
telechargement($_GET['key']);

?>
</body>
</html>