<?php
$betaUserUID = ["vwx234", "lmn789", "xyz901", "ghi789", "ijk456", "det56", "rst345", "6659953053cfa"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki GaleteZen</title>
    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'fonctions/navbar.php'; ?>
    <main>
        <div class="container marketing mt-5">
            <div class="row">
                <?php
                $data = json_decode(file_get_contents('./../intranet/database/user.json'), true);
                foreach($betaUserUID as $uid){ ?>
                    <div class="col-lg-4 text-center mb-3">
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="./intra-img/collaborateur/<?= $uid ?>.png" alt="Image de profil de <?= $data[$uid]['prenom'] ?> <?= $data[$uid]['nom'] ?>">
                        <h2 class="fw-normal"><?= $data[$uid]['prenom'] ?> <?= $data[$uid]['nom'] ?></h2>
                        <p>
                            <?= $data[$uid]['poste'] ?><br>
                            <span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill"><?= $data[$uid]['email'] ?></span><br>
                            <span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">Mot de Passe : <code>bonjour</code></span><br>
                        </p>
                        <p><a class="btn btn-secondary" href="http://<?php echo $_SERVER['SERVER_ADDR']; ?>:8080/connexion.php?email=<?= $data[$uid]['email'] ?>&password=bonjour">S'y connecter »</a></p>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </main>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
