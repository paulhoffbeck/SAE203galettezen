<?php
function connexionApplication(){
    if(isset($_POST['email']) && isset($_POST['mot_de_passe'])){
        $json = file_get_contents('./database/user.json');
        $donnee = json_decode($json, true);
        foreach($donnee as $uid => $user){
            if($user['email'] === $_POST['email']){
                if ($user['role_uid'] != ""){
                    if(password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])){
                        $_SESSION['uid'] = $uid;
                        $_SESSION['nom'] = $user['nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['mot_de_passe'] = $user['mot_de_passe'];
                        $_SESSION['role_uid'] = $user['role_uid'];
                        loadSessionPermissions($user['role_uid']);
                        header("Refresh:0");
                    }
                }else{
                    return "<div class=\"alert alert-warning\"><b>Connexion :</b>Vous n'êtes pas autorisé à vous connecter.</div>";
                }
            }
        }
        return "<div class=\"alert alert-warning\"><b>Connexion :</b> Données de connexion incorrects.</div>"; 
    }
}


function connexionFormulaire(){
    if(isset($_SESSION['uid']) && isset($_SESSION['nom']) && isset($_SESSION['mot_de_passe'])){
        header('Location: index.php');  
    }
    echo '
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <center><h3 class="mb-3">Connexion</h3></center>';
                    echo connexionApplication();
                    if(isset($_SESSION['uid'])){
                        echo '<a href="index.php"> Connexion validé, rendez-vous à l\'acceuil</a>';
                    }else{
                        echo '<div class="login-form">
                            <form method="post">
                                <div class="form-group mb-3">
                                    <label>Adresse mail :</label>
                                    <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse mail" required>
                                </div>
                                <label for="input-password">Mot de Passe :</label>
                                <div class="input-group mb-3">
                                    <input type="password" id="input-password" class="form-control" name="mot_de_passe" placeholder="Entrez votre mot de passe" required>
                                    <span class="input-group-text" onclick="viewinput(\'input-password\')"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                </div>
                                <br>
                                <center>
                                    <button type="submit" class="btn btn-azur"><i class="fa-solid fa-right-to-bracket"></i> Se connecter</button>
                                </center>
                            </form>
                        </div>';
                    }
                echo '</div>
            </div>
        </div>
    </div>
    <div class="text-center">
    <br>
    <p> Pas encore inscrit : <a href="inscription.php"> Inscrivez-vous </a> </p>
    <br>
    </div>
    ';
}
?>
