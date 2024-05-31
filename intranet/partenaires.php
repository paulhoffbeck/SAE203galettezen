<!doctype html>
<html lang="fr">
  <head>
  <title>Partenaire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
  </head>

<body  class="bg-pastel">
<?php
require_once("fonctions/main.php");
alreadylogin();
head();
navbar();

$partData = file_get_contents('intranet/database/partenaire.json', true);
$partTable = json_decode($partData, true);
?>

<div class="container mt-5">
        <div class="row">

<?php
foreach($partTable as $key => $value){
    echo("<div class=\"col-md-4\">
                    <div class=\"card\" style=\"width: 18rem;\">
                    <img src=\"".$value["image"]."\" class=\"card-img-top\" alt=\"\"\>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">".$key."</h5>
                            <p class=\"card-text\">".$value["description"]."</p>
                            <p class=\"card-text\">".$value["mail"]."</p>
                            <a href=\"".$value["lien"]."\" class=\"btn btn-primary\">visiter</a>
                        </div>
                    </div>
                </div>");
}

?>


                    

        </div>
</div>
