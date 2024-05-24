<?php
function sidebar() {
    echo '
    <nav id="sidebar" class="bg-ketchup text-white p-4">
        <h4>Au Menu</h4>
        <ul class="list-unstyled">
            <br>
            <li><a href="index.php" class="text-white">Accueil</a></li>
            <br>
            <li><a href="partenaires.php" class="text-white">Partenaires</a></li>
            <br>
            <li><a href="about.php" class="text-white">Qui sommes-nous</a></li>
            <br>
            <li><a href="history.php" class="text-white">Histoire</a></li>
            <br>
            <li><a href="activity.php" class="text-white">Activité</a></li>
            <br>
            <li><a href="contacts.php" class="text-white">Contacts</a></li>
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
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Airbus</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Stade Rennais</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="#!">Amora</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Tous droits réservés</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light">XDDL Enterprise ©</a>
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