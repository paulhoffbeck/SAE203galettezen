<?php require_once ("fonctions/main.php"); ?>
<!doctype html>
<html lang="fr">
<head>
    <title>Gestion des Utilisateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            emailjs.init("Yp4lst8YrH7O71nQi");
        })();
    </script>
</head>

<body  class="bg-pastel">
<?php alreadylogin(); head(); navbar(); ?>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-lg-4">
            <?php if(hasPermission("modo","liste-new-user",false)){ ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between" data-bs-toggle="collapse" href="#collapseValidation" role="button" aria-expanded="false" aria-controls="collapseValidation">
                        Comptes en attentes
                        <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill"><?= demandeValidationUserNumber() ?> demande(s)</span>
                    </div>
                    <div class="card-body collapse" id="collapseValidation">
                        <?= userEnAttenteValidation() ?>
                    </div>
                </div>
            <?php }if(hasPermission("modo","liste-user",false)){ ?>
                <div class="card mt-3">
                    <div class="card-header">
                        Comptes Actifs
                    </div>
                    <div class="card-body">
                        <?= activeUser() ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if(isset($_GET['uid'])){
            echo traitementUserValidation($_GET['uid']);
        } ?>
    </div>
</div>

<?php footer(); ?>

</body>
</html>
