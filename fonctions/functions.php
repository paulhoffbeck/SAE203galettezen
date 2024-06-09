<?php
function sidebar() {

    echo '
    <nav id="sidebar" class="bg-ketchup text-white p-4">
        <h4>Au Menu</h4>
        <ul class="list-unstyled">
            <br>
            <li><a href="index.php" class="text-white text-decoration-none">Accueil</a></li>
            <br>
            <li><a href="partenaires.php" class="text-white text-decoration-none">Partenaires</a></li>
            <br>
            <li><a href="about.php" class="text-white text-decoration-none">Qui sommes-nous</a></li>
            <br>
            <li><a href="history.php" class="text-white text-decoration-none">Histoire</a></li>
            <br>
            <li><a href="activity.php" class="text-white text-decoration-none">Activité</a></li>
            <br>
            <li><a href="contacts.php" class="text-white text-decoration-none">Contacts</a></li>
        </ul>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <img src="../intranet/img/sitevitrine/drapeaubreton.jpg" class="rounded-circle" alt="Cinque Terre" width="70" height="70">
        <img src="../intranet/img/sitevitrine/drapeaufrancais.jpg" class="rounded-circle" alt="Cinque Terre" width="70" height="70">  
    </nav>
        
    ';
}
function footer() {
    echo '
    <footer class="bg-cuit text-center text-white">
        <div class="container p-4">
            <section>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">A propos</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Qui sommes-nous ?</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Notre Histoire</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-white">
                        <h5 class="text-uppercase">Nos Produits</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Galettes Saucisses</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Galettes</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Crêpes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Partenaires</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="partenaires.php">Airbus</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="partenaires.php">Stade Rennais</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="partenaires.php">Amora</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Tous droits réservés</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light">Galetezen Enterprise ©</a>
                            </li>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </section>
        </div>
    </footer>
    ';
}



?> 
    <script>
      function action(){
        
        document.getElementById('toggleButton').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.display = sidebar.style.display === 'none' ? 'block' : 'none';
        });

      }
      action();
    </script>

<?php
require_once("partenaires.php");
?>