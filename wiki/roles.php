<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki GaleteZen</title>
    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style-intranet.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'fonctions/navbar.php'; ?>
    <main>
        <div class="container marketing mt-5">
            <div class="row">
                <div class="col">
                    <h4>Création d'un rôle</h4>
                    <p>Avec ce champ présent en haut de la page de gestion rôles il est possible ici de créer un nouveau rôle.</p>
                </div>
                <div class="col">
                    <table class="table">
                        <tr>
                            <td>
                                <input type="text" class="form-control form-control-sm" placeholder="Nouveau rôle">
                            </td>
                            <td>
                                <span class="btn btn-sm btn-turquoise"><i class="fa-solid fa-plus"></i></span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>Gestion des permissions</h4>
                    <p>Il est possible ensuite de d'activer des permissions pour chaque rôles de manière indépendente. Il y a 3 sections (Admin, Modo, Général) qui classe les permissions par leurs importances. Les permissions impactant un même système sont précédées par les même icons comme repère visuel.</p>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
