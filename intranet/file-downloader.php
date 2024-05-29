<?php require_once("fonctions/main.php"); alreadylogin(); ?>
<?php $_SESSION['uid'] = "086bae09778db"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Téléchargement de ressources</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['elementUID'])){
        if(!downloaderRessource($_GET['elementUID'])){ ?>
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <img src="../errors/saucisse-cocktail-interdit-403.png" alt="Famille de saucisses triste" width="100%">
                </div>
                <div class="col-lg-7">
                    <center>
                        <h1 class="display-4">Accès interdit</h1>
                        <h1 class="display-1 text-danger font-weight-bold">403</h1>
                        <p class="lead">Vous ne pouvez pas accéder à cette ressource, désolé.</p>
                        <a onclick="goBack()" class="btn btn-lg btn-block btn-outline-danger mt-3">Retour</a>
                    </center>
                </div>
            </div>
        <?php }
    } ?>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
