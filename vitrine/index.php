<?php
include '../functions/functions.php'
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaleteZen - Accueil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
<body>

<div class="d-flex">
  <div id="sidebar" class="bg-dark text-white p-3">
    <h4>Sidebar</h4>
    <ul class="list-unstyled">
      <li><a href="#" class="text-white">Item 1</a></li>
      <li><a href="#" class="text-white">Item 2</a></li>
      <li><a href="#" class="text-white">Item 3</a></li>
    </ul>
  </div>

  <div id="content" class="p-3 flex-grow-1">
    <button id="toggleButton" class="btn btn-primary mb-3">
        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
    </button>
    <h1>Contenu Principal</h1>
    <p>Voici le contenu principal de la page.</p>
  </div>
</div>

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

</body>
