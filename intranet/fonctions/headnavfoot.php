<?php

function head(){
echo'
<div class="bg-azur p-3">
  <div class="row">
    <div class="col-auto">
      <img src="./img/logo.png" alt="Logo de GaletZen" class=" texte-center mr-3 rounded" style="max-width: 50px; max-height: 50px;">
    </div>
    <div class="col-auto">
      <h1>GaleteZen</h1>
    </div>
  </div>
</div>';
}

function  navbar(){ 
echo '
<nav class="navbar navbar-expand-lg navbar-light bg-azur">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Accueil</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white" href="inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Moderation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Fournisseurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Clients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="collaborateur.php">Collaborateurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Fichiers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Wiki</a>
        </li>
      </ul>
      <form class="d-flex">';
      if(isset($_SESSION['nom']) && isset($_SESSION['prenom'])){
          echo '<span class="mt-1 text-white">Bonjour '.$_SESSION['prenom'].' '.strtoupper($_SESSION['nom']).'</span>
          <a href="deconnexion.php" class="btn btn-outline-ciel btn-sm text-white">Deconnexion</a>';
        }
      echo '</form>
    </div>
  </div>
</nav>';
}

function footer(){

echo('
<footer class="footer mb-0" style="background-color: #0078B8;">
    <div class="container-fluid jumbotron " style="background-color: #0078B8; ">
      <div class="row justify-content-center"> 
        <div class="col text-white m-5">
          Nous contacter : <br>
          Mail : contact@galetezen.com <br>
          Téléphone : 02-99-12-34-56

        </div>
        
      </div>
    </div>
  </footer>
');

}


?>