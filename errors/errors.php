<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erreur <?= $_GET['code'] ?></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>
  <?php if($_GET['code'] === "403"){ ?>
    <div class="row justify-content-center">
      <div class="col-lg-3 d-none d-lg-block">
        <img src="http://172.19.11.174/errors/saucisse-cocktail-interdit-403.png" alt="Famille de saucisses triste" width="100%">
      </div>
      <div class="col-lg-7">
        <center>
          <h1 class="display-4">Accès interdit</h1>
          <h1 class="display-1 text-danger font-weight-bold">403</h1>
          <p class="lead">Vous ne pouvez pas accéder à cette ressource, désolé.</p>
          <a href="/index.php" class="btn btn-lg btn-block btn-outline-danger mt-3">Retourner à l'accueil</a>
        </center>
      </div>
    </div>
  <?php }elseif($_GET['code'] === "404"){ ?>
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <center>
          <h1 class="display-4">Page non trouvée</h1>
          <h1 class="display-1 text-danger font-weight-bold">404</h1>
          <p class="lead">Désolé, nous n'avons pas trouvé la page que vous cherchez ...</p>
          <a href="/index.php" class="btn btn-lg btn-block btn-outline-danger mt-3">Retourner à l'accueil</a>
        </center>
      </div>
      <div class="col-lg-3 d-none d-lg-block">
        <img src="http://172.19.11.174/errors/saucisse-cherche.png" alt="Saucisse avec une loupe" width="100%">
      </div>
    </div>
  <?php }else{ ?>
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <center>
          <h1 class="display-4">Oups..., il y a une erreur !</h1>
          <p class="lead">Il semblerait qu'il y ait eu une erreur quelque part...</p>
          <a href="/index.php" class="btn btn-lg btn-block btn-outline-danger mt-3">Retourner à l'accueil</a>
        </center>
      </div>
      <div class="col-lg-3 d-none d-lg-block">
        <img src="http://172.19.11.174/errors/famille-saucisses-triste.png" alt="Saucisse avec une loupe" width="100%">
      </div>
    </div>
  <?php } ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
