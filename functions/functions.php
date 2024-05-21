<?php



function sidebar() {
    echo '<div class="col-sm-2 bg-ketchup">';
    echo '  <img src="../logo.png" width="80" height="80" class="rounded-circle ml-3" alt="Logo">';
    echo '  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">';
    echo '    <nav class="navbar">';
    echo '      <div class="container-fluid">';
    echo '          <button class="navbar-toggler bg-moutarde" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">';
    echo '            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>';
    echo '          </button>';
    echo '        </div>';
    echo '    </nav>';
    echo '    <div class="sidebar collapse" id="sidebar" data-bs-theme="dark">';
    echo '      <div class="p-4">';
    echo '        <a type="button" href="index.php" class="bg-moutarde btn btn-outline-dark">Accueil</a>';
    echo '        <br><br>';
    echo '        <a type="button" href="index.php" class="bg-moutarde btn btn-outline-dark">Qui sommes nous ?</a>';
    echo '        <br><br>';
    echo '        <a type="button" href="index.php" class="bg-moutarde btn btn-outline-dark">Histoire</a>';
    echo '        <br><br>';
    echo '        <a type="button" href="index.php" class="bg-moutarde btn btn-outline-dark">Activité</a>';
    echo '        <br><br>';
    echo '        <a type="button" href="index.php" class="bg-moutarde btn btn-outline-dark">Contacts</a>';
    echo '        <br><br>';
    echo '        <a type="button" href="index.php" class="bg-moutarde btn btn-outline-dark">Partenaires</a>';  
    echo '      </div>'; 
    echo '    </div>'; 
    echo '  </div>'; 
    echo '</div>'; 
    echo'<div class="col-sm-10 px-0 bg-crue">';
    echo '<div>';
    echo '  <nav class="navbar navbar-expand-sm bg-crue navbar-dark">';
    echo '    <h1>Galettezen, des crêpes bretonnes dans le monde entier !</h1>';
    echo '  </nav>';
    echo '</div>';
}