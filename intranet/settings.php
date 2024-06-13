<!doctype html>
<html lang="fr">
<head>
    <title>GaleteZen - Paramètres</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="d-flex flex-column min-vh-100 bg-pastel">

<?php
require_once('fonctions/main.php');
head(); navbar(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    Personnes en ligne
                </div>
                <div class="card-body">
                    <?= lastUserActivity() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php footer(); ?>

</body>
</html>