<?php

function head(){
//var_dump($_SESSION);
echo'
<div class="bg-azur p-3">
  <div class="row">
    <div class="col-auto">
      <img src="./img/logo.png" alt="Logo de GaletZen" class=" texte-center mr-3 rounded" style="max-width: 50px; max-height: 50px;">
    </div>
    <div class="col-auto text-white">
      <h1>GaleteZen</h1>
    </div>
  </div>
</div>';
}

function  navbar(){ 
echo '
<nav class="navbar navbar-expand-lg navbar-light bg-azur sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="partenaire.php">Partenaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Clients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="collaborateur.php">Collaborateurs</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestion</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user-management.php">Membres</a></li>
            <li><a class="dropdown-item" href="role.php">Rôles</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="file-manager.php?path=racine">Fichiers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../wiki/index.php">Wiki</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Bonjour '.$_SESSION['prenom'].' '.strtoupper($_SESSION['nom']).'
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profil.php">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="deconnexion.php">Deconnexion</a></li>
          </ul>
        </li>
      </form>
    </div>
  </div>
</nav>';
}

function footer(){

echo('
<footer class="footer py-3 mt-auto bg-azur">
    <div class="container-fluid jumbotron bg-azur">
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
