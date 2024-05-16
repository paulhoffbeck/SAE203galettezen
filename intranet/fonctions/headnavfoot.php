<?php

function head(){
echo('
<head>
<title>Bootstrap 5 Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>
</head>
<div style="background-color:#03045F;" class=" p-3 text-white">
  <h1 style="color:#EEE6D8;">galetezen</h1>
  <p style="color:#EEE6D8;"></p>
</div>
');
}

function  navbar(){
echo('
<nav style="background-color:#0078B8;" class="navbar navbar-expand-sm">
  
          <div class="container-fluid">
            <!-- Links -->
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
          nous contacter : <br>
          mail : contact@galetezen.com <br>
          telephone : 0299123456

        </div>
        
      </div>
    </div>
  </footer>

</body>
</html>
');

}


?>