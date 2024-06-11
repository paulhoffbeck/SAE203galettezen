<?php require_once("fonctions/main.php"); alreadylogin(); hasPermission("modo","liste-role",true); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestion des Rôles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-pastel">
    <?php alreadylogin(); head(); navbar() ?>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        Liste des Rôles
                    </div>
                    <div class="card-body">
                        <?php 
                        if(hasPermission("admin","create-role",false) && isset($_POST['create_role'])){
                            createRole($_POST['role_name']);
                        } ?>
                        <table class="table">
                            <tbody>
                                <?php if(hasPermission("admin","create-role",false)){ ?>
                                    <tr>
                                        <form method="POST" class="form">
                                            <td>
                                                <input type="text" name="role_name" id="role_name" class="form-control form-control-sm" placeholder="Nouveau rôle" required>
                                            </td>
                                            <td>
                                                <button type="submit" name="create_role" class="btn btn-sm btn-turquoise"><i class="fa-solid fa-plus"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php }
                                loadRoleListe() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['uid'])){
                if(hasPermission("modo","members-role",false)){ ?>
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
                <?php }if(hasPermission("admin","edit-perms-role",false)){ ?>
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
                <?php }elseif(hasPermission("modo","view-perms-role",false)){ ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Liste des permissions de "<?= getRoleName($_GET['uid']) ?>"
                            </div>
                            <div class="card-body">
                                <?php permissionViewer($_GET['uid']) ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>

    <?php footer(); ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
