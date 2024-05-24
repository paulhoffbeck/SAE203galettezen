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
    echo '    <h1>Galetezen, des crêpes bretonnes dans le monde entier !</h1>';
    echo '  </nav>';
    echo '</div>';
}

function render_footer() {
    echo '
    <!-- Footer -->
    <footer class="bg-ketchup text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn btn-moutarde btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn btn-moutarde btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-twitter"></i>
                </a>

                <!-- Google -->
                <a data-mdb-ripple-init class="btn btn-moutarde btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-google"></i>
                </a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn btn-moutarde btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-instagram"></i>
                </a>

                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn btn-moutarde btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-linkedin-in"></i>
                </a>

                <!-- Github -->
                <a data-mdb-ripple-init class="btn btn-moutarde btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-github"></i>
                </a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section>
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Inscrivez-vous à notre newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form5Example24" class="form-control" />
                                <label class="form-label" for="form5Example24">Adresse mail</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit" class="btn btn-moutarde mb-4">
                                S\'abonner
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Links -->
            <section>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">A propos</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body link-light" href="#!">Qui sommes-nous ?</a>
                            </li>
                            <li>
                                <a class="text-body link-light" href="#!">Notre Histoire</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-white">
                        <h5 class="text-uppercase">Nos Produits</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body link-light" href="#!">Galettes Saucisses</a>
                            </li>
                            <li>
                                <a class="text-body link-light" href="#!">Galettes</a>
                            </li>
                            <li>
                                <a class="text-body link-light" href="#!">Crêpes</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Partenaires</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-body link-light" href="#!">Airbus</a>
                            </li>
                            <li>
                                <a class="text-body link-light" href="#!">Stade Rennais</a>
                            </li>
                            <li>
                                <a class="text-body link-light" href="#!">Amora</a>
                            </li>
                            <p>Et bien d\'autres !</p>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Tous droits réservés</h5>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    ';
}


?> 
