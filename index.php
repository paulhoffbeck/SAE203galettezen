<?php
require_once('fonctions/functions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>GaleteZen - Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <div class="bg-crue" style="background-image: url('./intranet/img/sitevitrine/stmalo.jpg'); background-size: cover; background-position: center; position: relative;">
        <div class="d-flex" style="background-color: rgba(0, 0, 0, 0.5);">
            <?php sidebar(); ?>
            <div class="p-3 flex-grow-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button id="toggleButton" class="btn btn-ketchup">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                    </button>        
                    <div class="d-flex align-items-center">
                        <a href="index.php"> 
                        <img src="./intranet/img/logo.png" alt="logo" class="img-thumbnail border border-primary rounded" style="width: 80px;">
                        </a>
                    </div>
                </div>
                <div class="text-center text-white mt-5">
                    <h1>GaleteZen</h1>
                    <h5>Entreprise malouine de crêpes et galettes</h5>
                    <p>France, Allemagne, Etats-Unis, Japon, Russie, Afrique du Sud... Grâce à nous la bonne galette bretonne est exportée partout dans le monde !</p>
                    <p>Avec des produits locaux et de qualités, emportez un bout de Bretagne partout dans le monde avec GaleteZen</p>
                </div>
                <div class="carousel slide" id="demo" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center">
                                <img src="./intranet/img/sitevitrine/rue.jpg" alt="galette1" class="d-block w-50 h-50 img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                <img src="./intranet/img/sitevitrine/truck.jpg" alt="galette1" class="d-block w-50 h-50 img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                <img src="./intranet/img/sitevitrine/truck2.jpg" alt="galette1" class="d-block w-50 h-50 img-fluid">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        action();
    </script>
</body>
<?php footer(); ?>
</html>