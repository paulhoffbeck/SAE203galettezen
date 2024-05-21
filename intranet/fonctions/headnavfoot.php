<?php

function head(){
var_dump($_SESSION);
  echo'
<div class="bg-pastel" class="p-3">
  <img src="./img/logo.png" alt="Logo de GaletZen" class=" texte-center mr-3 rounded" 
  style="max-width: 50px; max-height: 50px;">
  <h1 class=" texte-center"> GaleteZen</h1>'; 
  if(isset($_SESSION["prenom"])){
    echo '<span class="text-indigo">Bonjour '.$_SESSION["prenom"].' '. $_SESSION["nom"]. ' !</span>
    <a href="deconnexion.php" class="btn btn-outline-dark btn-sm">Deconnexion</a>';}
  echo'</div>';
}

function  navbar(){
echo('
<nav class="navbar bg-azur navbar-expand-sm">
  
          <div class="container-fluid">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Accueil</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white" href="inscription.php">Inscription</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Membres</a>
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
                <a class="nav-link text-white" href="#">Fichiers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Wiki</a>
              </li>
              
            
            </ul>
            </div>
        </nav>
');
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