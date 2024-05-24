<?php
include '../functions/functions.php'
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>GaleteZen - Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>



<body>
<div class="bg-crue  ">
<div class="d-flex">
  <nav id="sidebar" class="bg-ketchup text-white p-4">
    <h4> Au Menu</h4>
    <ul class="list-unstyled">
      <li><a href="index.php" class="text-white">Accueil</a></li>
      <li><a href="partenaires.php" class="text-white">Partenaires</a></li>
      <li><a href="about.php" class="text-white">Qui sommes-nous</a></li>
      <li><a href="history.php" class="text-white">Histoire</a></li>
      <li><a href="activity.php" class="text-white">Activité</a></li>
      <li><a href="contacts.php" class="text-white">Contacts</a></li>
    </ul>
  </nav>


  <div id="content" class="p-3 flex-grow-1">
  <button id="toggleButton" class="btn btn-ketchup mb-3">
        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
    </button>
  <div class="text-center">
      <h1>GaleteZen</h1>
      <p>Entreprise malouine de crêpes et galettes</p>
  </div>
    
    
  </div>
</div>
</div>
<div>


<div id="demo" class="carousel slide bg-crue" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="d-flex justify-content-center">
        <img src="galete1.jpg" alt="galette1" class="d-block w-50 img-fluid">
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center">
        <img src="galete2.jpg" alt="galette2" class="d-block w-50 img-fluid">
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center">
        <img src="Galete4.jpeg" alt="galete3" class="d-block w-50 img-fluid">
      </div>
    </div>
  </div>

<!-- The slideshow/carousel 
<div class="carousel-inner">
  <div class="carousel-item active container">
    <div class="text-center">
      <img src="galete1.jpg" alt="Los Angeles" class="d-block w-50 img-fluid mx-auto" style="columns: md -6px;">
    </div>
  </div>
  <div class="carousel-item container">
    <img src="galete2.jpg" alt="Chicago" class="d-block w-50 img-fluid mx-auto" style="columns: md -6px;">
  </div>
  <div class="carousel-item container">
    <img src="test.jpg" alt="New York" class="d-block w-50 img-fluid mx-auto" style="columns: md -6px;"> 
  </div>
</div>-->

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>



</div>
<div>
  <script>
    document.getElementById('toggleButton').addEventListener('click', function() {
      var sidebar = document.getElementById('sidebar');
      if (sidebar.style.display === 'none') {
        sidebar.style.display = 'block';
      } else {
        sidebar.style.display = 'none';
      }
    });
  </script>
</div>
</body>