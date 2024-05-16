<?php
require_once "./fonctions/main.php";
if(isset($_POST['create_role'])){
    // createRole($_POST['role_name']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-pastel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        Liste des Rôles
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Directeur Général</td>
                                    <td>
                                        <a href="role.php" class="btn btn-sm btn-azur">Permissions</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Directeur Marketing</td>
                                    <td>
                                        <a href="role.php" class="btn btn-sm btn-azur">Permissions</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Responsable Informatique</td>
                                    <td>
                                        <a href="role.php" class="btn btn-sm btn-azur">Permissions</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Commercial</td>
                                    <td>
                                        <a href="role.php" class="btn btn-sm btn-azur">Permissions</a>
                                    </td>
                                </tr>
                                <tr>
                                    <form method="POST" class="form">
                                        <td>
                                            <input type="text" name="role_name" id="role_name" class="form-control form-control-sm" placeholder="Nouveau rôle">
                                        </td>
                                        <td>
                                            <button type="submit" name="create_role" class="btn btn-sm btn-turquoise">Créer</button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        Modification des permissions de "Commercial"
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
