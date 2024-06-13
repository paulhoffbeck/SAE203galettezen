<?php
include './fonctions/functions.php';
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
<div class="bg-crue">
    <div class="d-flex">
        <?php
          sidebar();
        ?>
        <div class="p-3 flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button id="toggleButton" class="btn btn-ketchup">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                </button>        
                <div class="d-flex align-items-center">
                    <a href="index.php"> 
                        <img src="./intranet/img/logo.png" alt="logo" style="width: 80px;">
                    </a>
                </div>
            </div>

            <div class="text-center">
                <h1 class="text-uppercase">GaleteZen</h1>
                <h4>Entreprise malouine de crêpes et galettes</h4>
                <h4 class="text-uppercase">Notre Activité</h4>
                
            </div>
            <div class="container card-wrapper d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-4 h-100 d-flex flex-column"> <!--pour faire un conteneur vertical et que tout soit compris dedans -->
                            <img src="./intranet/img/sitevitrine/galete4.jpeg" class="card-img-top" alt="test">
                            <div class="card-body d-flex flex-column justify-content-between"> <!--pour que le conetenu soit aussi disposé verticalement et que ca coordonne avec le conteneur vertical -->
                                <div>
                                    <h5 class="card-title text-center">Nos galettes</h5>
                                    <p class="card-text text-center">Imaginez-vous savourer une délicieuse galette malouine GaleteZen, croustillante à l'extérieur et moelleuse à l'intérieur, garnie de fromage fondu, de jambon savoureux et d'un œuf parfaitement coulant, le tout accompagné d'un verre de cidre frais. Un véritable festin pour vos papilles !</p>
                                </div>
                                <a href="https://fr.wikipedia.org/wiki/Galette_de_sarrasin_(Haute-Bretagne)" class="btn btn-ketchup mt-auto align-self-center">Déguster ma galette</a> <!--centrage du bouton -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 h-100 d-flex flex-column">
                            <img src="./intranet/img/sitevitrine/galettesaucisse.jpeg" class="card-img-top" alt="test">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-center">Nos galettes saucisses</h5>
                                    <p class="card-text text-center">Imaginez-vous croquer dans une galette saucisse, où la galette de sarrasin légèrement grillée enveloppe une saucisse parfaitement assaisonnée, accompagnée d'une pointe de moutarde Amora à l'ancienne. Une explosion de saveurs bretonnes qui éveillera tous vos sens !</p>
                                </div>
                                <a href="https://fr.wikipedia.org/wiki/Galette-saucisse" class="btn btn-ketchup mt-auto align-self-center">Déguster ma galette saucisse</a>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-3">
                        <div class="card mb-4 h-100 d-flex flex-column">
                            <img src="./intranet/img/sitevitrine/crepes.jpeg" class="card-img-top" alt="test">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-center">Nos crêpes</h5>
                                    <p class="card-text text-center">Savourez des crêpes bretonnes, fines et délicatement dorées, garnies de beurre fondant et de sucre, ou encore d'un caramel au beurre salé maison. Un véritable délice qui vous transporte au cœur de la Bretagne à chaque bouchée !</p>
                                </div>
                                <a href="https://fr.wikipedia.org/wiki/Cr%C3%AApe_bretonne" class="btn btn-ketchup mt-auto align-self-center">Déguster ma crêpe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 h-100 d-flex flex-column"> 
                            <img src="./intranet/img/sitevitrine/caramel.jpeg" class="card-img-top" alt="test">
                            <div class="card-body d-flex flex-column justify-content-between"> 
                                <div>
                                    <h5 class="card-title text-center">Notre caramel</h5>
                                    <p class="card-text text-center">Laissez-vous séduire par l'onctuosité du caramel au beurre salé, une symphonie de saveurs sucrées et salées qui enrobe délicieusement vos papilles, vous transportant dans un tourbillon de gourmandise à chaque dégustation.</p>
                                </div>
                                <a href="https://fr.wikipedia.org/wiki/Caramel_au_beurre_sal%C3%A9" class="btn btn-ketchup mt-auto align-self-center">Goûter notre Caramel</a> 
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<script>
  action();
</script>
</body>   
<?php
footer();
?>
</html>
