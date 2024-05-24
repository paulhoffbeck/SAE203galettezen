<?php require_once("fonctions/main.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestion des Rôles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-pastel">
    <?php head(); navbar() ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        Liste des Rôles
                    </div>
                    <div class="card-body">
                        <?php 
                        if(isset($_POST['create_role'])){
                            createRole($_POST['role_name']);
                        } ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <form method="POST" class="form">
                                        <td>
                                            <input type="text" name="role_name" id="role_name" class="form-control form-control-sm" placeholder="Nouveau rôle" required>
                                        </td>
                                        <td>
                                            <button type="submit" name="create_role" class="btn btn-sm btn-turquoise">Créer</button>
                                        </td>
                                    </form>
                                </tr>
                                <?php loadRoleListe() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['uid'])){ ?>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            Membres de "<?= getRoleName($_GET['uid']) ?>"
                        </div>
                        <div class="card-body">
                            <?php getMembreRoleListe($_GET['uid']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Modification des permissions de "<?= getRoleName($_GET['uid']) ?>"
                        </div>
                        <div class="card-body">
                            <?php permissionEditor($_GET['uid']) ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php footer(); ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
