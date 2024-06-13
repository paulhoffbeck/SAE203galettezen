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
        <img src="./intranet/img/sitevitrine/drapeaubreton.jpg" class="rounded-circle" alt="Cinque Terre" width="70" height="70">
        <img src="./intranet/img/sitevitrine/drapeaufrancais.jpg" class="rounded-circle" alt="Cinque Terre" width="70" height="70">  
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
                        <h5 class="text-uppercase">À propos</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="about.php">Qui sommes-nous ?</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="history.php">Notre Histoire</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-white">
                        <h5 class="text-uppercase">Nos Produits</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="activity.php">Galettes Saucisses</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="activity.php">Galettes</a>
                            </li>
                            <li>
                                <a class="text-body text-crue text-decoration-none link-light" href="activity.php">Crêpes</a>
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
                        <h5 class="text-uppercase">Nous contacter</h5>
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-envelope"></i> contact@galetezen.com </li>
                            <li><i class="fas fa-phone"></i> 02 99 84 12 35 </li>
                            
                            
                        </ul>
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <p class="text-center text-crue">© GaleteZen Entreprise - Tous droits réservés</p>
                    </div>
                </div>
            </section>
        </div>
    </footer>
    ';
}

function traitementcontact(){
    $uid=uniqid();
    $nom = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $mail = $_POST['email'];
    $sujet = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message =filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $date = date('d/m/Y');

    $nouveaucontact = array(
        'nom' => $nom,
        'mail' => $mail,
        'sujet' => $sujet,
        'message' => $message,
        'date' => $date
    );
    $fichier = file_get_contents('./intranet/database/contactlist.json');
    $data = json_decode($fichier, true);
    $data[$uid] = $nouveaucontact;
    $newjson = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('./intranet/database/contactlist.json', $newjson);
    echo "<script type='text/javascript'>alert('Envoie Confirmé');</script>";
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
require_once("./fonctions/partenaires.php");
?>