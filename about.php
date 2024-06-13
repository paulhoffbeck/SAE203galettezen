
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
                    <h1>Qui sommes-nous ?</h1>
                    <h5>Par soucis de transparence, voici toutes nos équipes !</h5>
                    <p>Nous sommes une équipe de passionnés de crêpes et de galettes qui ont a coeur de partager leur passion pour la culture bretonne !</p>
                </div>
                <div class="container">
                    <div class="row">
                    <?php
                    $fichierutilisateur = file_get_contents('./intranet/database/user.json');
                    $tableauutilisateur = json_decode($fichierutilisateur, true);
                    foreach ($tableauutilisateur as $keys => $user) {
                    if($user['visibilite'] == true ){
                        echo '<div class="col-3 mb-4">';
                        echo '<div class="card mb-4 d-flex h-100 flex-column" style="width: 18rem;">';
                        
                        $imagePath = './intranet/img/collaborateur/' . $keys . '.png';
                        if (file_exists($imagePath)) {
                            echo '<img src="' . htmlspecialchars($imagePath) . '" class="card-img-top" alt="Image de ' . htmlspecialchars($user['prenom']) . ' ' . htmlspecialchars($user['nom']) . '" style="height: 200px; object-fit: cover;">';
                        } else {
                            echo '<img src="./intranet/img/collaborateur/pasdepp.png" class="card-img-top" alt="Image par défaut" style="height: 200px; object-fit: cover;">';
                        }
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . htmlspecialchars($user['nom']) . ' ' . htmlspecialchars($user['prenom']) . '</h5>';
                        echo '<p class="card-text">Rôle: ' . htmlspecialchars($user['poste']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                      }
                    }
                  ?>
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
