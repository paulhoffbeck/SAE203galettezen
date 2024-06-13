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
                <?php
                partenaires();
                ?>
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


