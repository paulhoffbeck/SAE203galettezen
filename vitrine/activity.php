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
        ?>
        <div class="p-3 flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button id="toggleButton" class="btn btn-ketchup">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                </button>        
                <div class="d-flex align-items-center">
                    <img src="../intranet/img/logo.png" alt="logo" style="width: 80px;">
                </div>
            </div>

            <div class="text-center">
                <h1>GaleteZen</h1>
                <h5>Entreprise malouine de crêpes et galettes</h5>
                <h3>Quelques exemples de nos produits :</h3>
            </div>

            <div class="d-flex flex-wrap gap-3">
                <div class="card" style="width: 18rem;">
                    <img src="../intranet/img/sitevitrine/galete4.jpeg" class="card-img-top" alt="test">
                    <div class="card-body">
                        <h5 class="card-title">Nos galettes</h5>
                        <p class="card-text">Imaginez une galette saucisse, chaude et croustillante, enveloppant une saucisse grillée, le tout garni d'une moutarde Amora légèrement piquante qui éveille vos papilles à chaque bouchée.</p>
                        <a href="#" class="btn btn-ketchup">Déguster ma galette saucisse</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="../intranet/img/sitevitrine/galettesaucisse.jpeg" class="card-img-top" alt="test">
                    <div class="card-body">
                        <h5 class="card-title">Nos galettes saucisses</h5>
                        <p class="card-text">Imaginez une galette saucisse, chaude et croustillante, enveloppant une saucisse grillée, le tout garni d'une moutarde Amora légèrement piquante qui éveille vos papilles à chaque bouchée.</p>
                        <a href="#" class="btn btn-ketchup">Déguster ma galette saucisse</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="../intranet/img/sitevitrine/crepes.jpeg" class="card-img-top" alt="test">
                    <div class="card-body">
                        <h5 class="card-title">Nos crêpes</h5>
                        <p class="card-text">Imaginez une crêpe dorée et moelleuse, garnie de fraises fraîches et de crème fouettée, avec une légère touche de sucre glace qui fond délicieusement en bouche.</p>
                        <a href="#" class="btn btn-ketchup">Déguster ma crêpe</a>
                    </div>
                </div>
                
                <div class="card" style="width: 18rem;">
                    <img src="../intranet/img/sitevitrine/caramel.jpeg" class="card-img-top" alt="test">
                    <div class="card-body">
                        <h5 class="card-title">Notre caramel</h5>
                        <p class="card-text">Imaginez une galette saucisse, chaude et croustillante, enveloppant une saucisse grillée, le tout garni d'une moutarde Amora légèrement piquante qui éveille vos papilles à chaque bouchée.</p>
                        <a href="#" class="btn btn-ketchup">Déguster ma galette saucisse</a>
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