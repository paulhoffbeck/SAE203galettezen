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
        <section style="background-image: url('./img/saint-malo-modifie.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light text-white">Wiki GaleteZen</h1>
                        <p class="lead text-white">Vous trouverez ici un guide détaillé sur le fonctionnement de l'ensemble des fonctionnalités disponibles dans notre solution technique. Cette page décrit en détail le site, l'utilisation des différentes fonctionnalités de votre projet, et fournit également la liste des identifiants et mots de passe nécessaires pour tester le site.</p>
                        <p>
                            <a href="http://<?php echo $_SERVER['SERVER_ADDR']; ?>/index.php" class="btn btn-primary my-2">Vitrine</a>
                            <a href="http://<?php echo $_SERVER['SERVER_ADDR']; ?>:8080/index.php" class="btn btn-secondary my-2">Intranet</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top h-100" src="./img/css-card.png" alt="" width="100%">
                            <div class="card-body">
                                <p class="card-text">Explorez la personnalisation CSS de Bootstrap que nous avons réalisé. Découvrez comment ajuster les couleurs et styles pour des interfaces toujours plus uniques.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./couleurs.php" class="btn btn-sm btn-outline-secondary">Consulter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top h-100" src="./img/user-card.png" alt="" width="100%">
                            <div class="card-body">
                                <p class="card-text">Explorez l'interface intranet de GaleteZen de manière interactive en vous connectant avec nos utilisateurs de démonstration. Découvrez comment nos fonctionnalités peuvent répondre à vos besoins.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./users.php" class="btn btn-sm btn-outline-secondary">Consulter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top h-100" src="./img/clients.png" alt="" width="100%">
                            <div class="card-body">
                                <p class="card-text">Découvrez comment nous avons réaliser la page d'affichage des clients et toutes ses fonctionnalités.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./clients.php" class="btn btn-sm btn-outline-secondary">Consulter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top h-100" src="./img/file-manager.png" alt="" width="100%">
                            <div class="card-body">
                                <p class="card-text">Le gestionnaire de fichiers est un outil qui permet de stocker et d'organiser des ressources de différents formats, accessibles depuis tous vos équipements, et de les partager facilement.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./gestion-fichier.php" class="btn btn-sm btn-outline-secondary">Consulter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">

                            <img class="bd-placeholder-img card-img-top h-100" src="./img/partenaires.jpg" alt="" width="100%">
                            <div class="card-body">
                                <p class="card-text">Decouvrez comment nous avons réalisé la page partenaires.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./partenaires.php" class="btn btn-sm btn-outline-secondary">Consulter</a>

                                      
                                      
                                      
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">                                      
                            <img class="bd-placeholder-img card-img-top h-100" src="./img/collaborateurs.png" alt="" width="100%">
                            <div class="card-body">
                                <p class="card-text">Découvrez comment nous avons réaliser la page d'affichage de nos employés/collaborateurs et toutes ses fonctionnalités.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./collaborateur.php" class="btn btn-sm btn-outline-secondary">Consulter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top h-100" src="./img/vitrine.png" alt="" width="100%">
                            <div class="card-body">
                                <p class="card-text">Explorez les interfaces WEB du site vitrine !</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./vitrine.php" class="btn btn-sm btn-outline-secondary">Consulter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
