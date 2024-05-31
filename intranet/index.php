<?php require_once ("fonctions/main.php"); ?>
<!doctype html>
<html lang="fr">
  <head>
  <title>Acceuil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
  </head>

<body  class="bg-pastel">
<?php alreadylogin(); head(); navbar(); ?>
<div class="container mt-3 mb-3">
  <div class="row">
    <div class="col-lg-3">
      <div class="card">
        <div class="card-header">
          Personnes en ligne
        </div>
        <div class="card-body">
          <?= lastUserActivity() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php footer(); ?>

</body>
</html>
