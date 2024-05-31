<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Couleurs CSS</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
    .card-ketchup {
        background-color: #A7001E;
        transition: background-color 0.5s;
    }
    .card-ketchup:hover {
        background-color: #610012;
    }
    .card-moutarde {
        background-color: #DAAB3A;
        transition: background-color 0.5s;
    }
    .card-moutarde:hover {
        background-color: #a47916;
    }
    .card-crue {
        background-color: #EEE6D8;
        transition: background-color 0.5s;
    }
    .card-crue:hover {
        background-color: #dcd0ba;
    }
    .card-cuit {
        background-color: #B67332;
        transition: background-color 0.5s;
    }
    .card-cuit:hover {
        background-color: #8a521a;
    }
    .card-brule {
        background-color: #93441A;
        transition: background-color 0.5s;
    }
    .card-brule:hover {
        background-color: #75320f;
    }
    .card-indigo {
        background-color: #03045F;
        transition: background-color 0.5s;
    }
    .card-indigo:hover {
        background-color: #021E41;
    }
    .card-azur {
        background-color: #0078B8;
        transition: background-color 0.5s;
    }
    .card-azur:hover {
        background-color: #00568D;
    }
    .card-turquoise {
        background-color: #00B6DA;
        transition: background-color 0.5s;
    }
    .card-turquoise:hover {
        background-color: #008FA5;
    }
    .card-ciel {
        background-color: #93E1F0;
        transition: background-color 0.5s;
    }
    .card-ciel:hover {
        background-color: #6DBDD1;
    }
    .card-pastel {
        background-color: #CEF1F9;
        transition: background-color 0.5s;
    }
    .card-pastel:hover {
        background-color: #A5D8E7;
    }
    </style>
</head>
<body>
    <?php include 'fonctions/navbar.php'; ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10 mb-3 mt-5">
                <h1>Site Vitrine :</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <a class="col-md-2 text-decoration-none" href="ketchup.php">
                <div class="card card-ketchup text-center" style="height: 200px;">
                    <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h1 class="card-title text-white">Ketchup</h1>
                    </div>
                    <div class="position-absolute bottom-0 end-0 p-3 pb-0">
                        <h6 class="card-title text-white">#A7001E</h6>
                    </div>
                </div>
            </a>
            <a class="col-md-2 text-decoration-none" href="moutarde.php">
                <div class="card card-moutarde text-center" style="height: 200px;">
                    <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h1 class="card-title text-dark">Moutarde</h1>
                    </div>
                    <div class="position-absolute bottom-0 end-0 p-3 pb-0">
                        <h6 class="card-title text-dark">#DAAB3A</h6>
                    </div>
                </div>
            </a>
            <a class="col-md-2 text-decoration-none" href="crue.php">
                <div class="card card-crue text-center" style="height: 200px;">
                    <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h1 class="card-title text-dark">Crue</h1>
                    </div>
                    <div class="position-absolute bottom-0 end-0 p-3 pb-0">
                        <h6 class="card-title text-dark">#EEE6D8</h6>
                    </div>
                </div>
            </a>
            <a class="col-md-2 text-decoration-none" href="cuit.php">
                <div class="card card-cuit text-center" style="height: 200px;">
                    <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h1 class="card-title text-dark">Cuit</h1>
                    </div>
                    <div class="position-absolute bottom-0 end-0 p-3 pb-0">
                        <h6 class="card-title text-dark">#B67332</h6>
                    </div>
                </div>
            </a>
            <a class="col-md-2 text-decoration-none" href="brule.php">
                <div class="card card-brule text-center" style="height: 200px;">
                    <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h1 class="card-title text-white">Brule</h1>
                    </div>
                    <div class="position-absolute bottom-0 end-0 p-3 pb-0">
                        <h6 class="card-title text-white">#93441A</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10 mb-3 mt-5">
                <h1>Site Intranet :</h1>
            </div>
        </div>
    <div class="row justify-content-center align-items-center">
    <a class="col-md-2 text-decoration-none" href="indigo.php">
        <div class="card card-indigo text-center" style="height: 200px;">
          <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
            <h1 class="card-title text-white">Indigo</h1>
          </div>
          <div class="position-absolute bottom-0 end-0 p-3 pb-0">
            <h6 class="card-title text-white">#03045F</h6>
          </div>
        </div>
    </a>
    <a class="col-md-2 text-decoration-none" href="azur.php">
        <div class="card card-azur text-center" style="height: 200px;">
          <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
            <h1 class="card-title text-white">Azur</h1>
          </div>
          <div class="position-absolute bottom-0 end-0 p-3 pb-0">
            <h6 class="card-title text-white">#0078B8</h6>
          </div>
        </div>
    </a>
    <a class="col-md-2 text-decoration-none" href="turquoise.php">
        <div class="card card-turquoise text-center" style="height: 200px;">
          <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
            <h1 class="card-title text-dark">Turquoise</h1>
          </div>
          <div class="position-absolute bottom-0 end-0 p-3 pb-0">
            <h6 class="card-title text-dark">#00B6DA</h6>
          </div>
        </div>
    </a>
    <a class="col-md-2 text-decoration-none" href="ciel.php">
        <div class="card card-ciel text-center" style="height: 200px;">
          <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
            <h1 class="card-title text-dark">Ciel</h1>
          </div>
          <div class="position-absolute bottom-0 end-0 p-3 pb-0">
            <h6 class="card-title text-dark">#93E1F0</h6>
          </div>
        </div>
    </a>
    <a class="col-md-2 text-decoration-none" href="pastel.php">
        <div class="card card-pastel text-center" style="height: 200px;">
          <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
            <h1 class="card-title text-dark">Pastel</h1>
          </div>
          <div class="position-absolute bottom-0 end-0 p-3 pb-0">
            <h6 class="card-title text-dark">#CEF1F9</h6>
          </div>
        </div>
    </a>
    </div>
  </div>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
