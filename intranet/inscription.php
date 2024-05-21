<!doctype html>
<html lang="fr">
  <head>
  <title>inscription</title>
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

echo'<br>';


?>

<h1>inscription</h1>


<div class="card">

    <div class="card-body">
        
    <form action="inscription.php" method="post" class="mt-3">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <input type="hidden" class="form-control" id="uid" name="uid" value=<?php echo('"'.uniqid().'"'); ?>>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password">Confirmation de Mot de passe :</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
            </div>
            <?php
                $verif = True;
                if(isset($_POST["password"]) && isset($_POST["cpassword"])){
                  if ($_POST["password"]!=$_POST["cpassword"]) {
                    echo("<p class='text-danger'>mauvais mot de passe</p>");
                    $verif = False;
                  }
                  
                //   header('Location: traitement-inscription.php');



                    var_dump($_POST);

                    $mail = $_POST["email"];
                    $domaine = explode("@",$mail)[1];

                    var_dump($domaine);

                    if ($domaine != "galetezen.com") {
                    echo("l'adresse mail n'appartient pas au domaine de l'entrprise.");
                    }else{
                    
                    // $to      = 'simoncollet2005@gmail.com';
                    // $subject = 'le sujet est super';
                    // $message = 'Bonjour !';
                    // $headers = 'From: simoncollet2005@gmail.com';

                    // mail($to, $subject, $message, $headers);
                    
                    $alea = rand(000000,999999);
                    echo($alea);

                    }
                }
            ?>
            
            <button type="submit" class="btn btn-azur">S'inscrire</button>
        </form>




        </form>

    </div>

  
</div>


<?php

footer();

?>

</body>
</html>