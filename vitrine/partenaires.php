<?php
include '../functions/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>GaleteZen - Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <div class="bg-crue">
        <div class="d-flex">
            <?php
              sidebar();
              

                $partData = file_get_contents('../intranet/database/partenaire.json', true);
                $partTable = json_decode($partData, true);


echo("<div class=\"container mt-5\">
        <table>");


var_dump($partTable);
foreach($partTable as $key => $value){
    echo("<div class=\"col-md-4\">
                    <div class=\"card\" style=\"width: 18rem;\">
                    <img src=\"".$value["image"]."\" class=\"card-img-top\" alt=\"\"\>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">".$key."</h5>
                            <p class=\"card-text\">".$value["description"]."</p>
                            <p class=\"card-text\">".$value["email"]."</p>
                            <a href=\"".$value["lien"]."\" class=\"btn btn-primary\">visiter</a>
                        </div>
                    </div>
                </div>");
}

?>


                    

        </div>
<table>
