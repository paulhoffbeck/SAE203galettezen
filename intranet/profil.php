<?php require_once ("fonctions/main.php"); ?>
<!doctype html>
<html lang="fr">
  <head>
  <title>Profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body  class="bg-pastel">
<?php alreadylogin(); head(); navbar(); ?>
<div class="container mt-3 mb-3">
    <?php
    if(isset($_POST['uploadNewPP']) && isset($_SESSION['uid'])){
        changeImage("./img/collaborateur/",$_SESSION['uid'].".png");
    }if(isset($_POST['changePersonnalPassword']) && isset($_SESSION['uid'])){
        if(changePasswordUser($_SESSION['uid'],$_POST['NewPassword'],$_POST['ConfirmNewPassword'],$_POST['ActualPassword'])){
            echo "<div class=\"alert alert-success mt-2 mb-2\">Votre mot de passe à bien été modifié pour votre prochainne connexion.</div>";
        }else{
            echo "<div class=\"alert alert-warning mt-2 mb-2\">Une erreur n'a pas permis de changer le mot de passe. Verifiez si votre mot de passe est correct et que les 2 nouveaux mots de passes soit identiques.</div>";
        }
    } ?>
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Votre profil
                </div>
                <div class="card-body">
                    <?php 
                    if(file_exists("./img/collaborateur/{$_SESSION['uid']}.png")){
                        $image = "./img/collaborateur/{$_SESSION['uid']}.png";
                    }else{
                        $image = "./img/collaborateur/pasdepp.png";
                    } ?>
                    <div class="row">
                        <div class="col-lg-auto">
                            <center>
                                <img src="<?= $image ?>" class="rounded" width="128px">
                            </center>
                        </div>
                        <div class="col-lg-auto">
                            <h4><?= $_SESSION['prenom'].' '.$_SESSION['nom'] ?></h4>
                            <b>Email : </b><?= $_SESSION['email'] ?><br>
                            <b>Téléphone : </b><?= $_SESSION['telephone'] ?><br>
                            Occupe le poste de <?= $_SESSION['poste'] ?><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Photo de Profil
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" class="mt-3">
                        <label>Selectionnez une nouvelle photo :</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                            <button type="submit" name="uploadNewPP" class="input-group-text btn btn-outline-azur"><i class="fa-solid fa-camera"></i> Changer la photo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Modifier le mot de passe
                </div>
                <div class="card-body">
                    <form method="POST">
                        <label>Mot de passe actuel :</label>
                        <input type="password" name="ActualPassword" class="form-control mb-3">
                        <label>Nouveau mot de passe :</label>
                        <input type="password" name="NewPassword" class="form-control mb-3">
                        <label>Confirmer le nouveau mot de passe :</label>
                        <input type="password" name="ConfirmNewPassword" class="form-control mb-3">
                        <center>
                            <button type="submit" name="changePersonnalPassword" class="btn btn-azur"><i class="fa-solid fa-key"></i> Appliquer</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php footer(); ?>

</body>
</html>
