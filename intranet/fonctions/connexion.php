<?php
function connexion(){
    if(isset($_SESSION['uid']) && isset($_SESSION['nom']) && isset($_SESSION['mot_de_passe'])){
        header('Location: index.php');  
    }
    echo '
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <p> Connectez-vous pour accéder à l\'intranet </p>';
                    if(isset($_SESSION['nom']) && isset($_SESSION['mot_de_passe'])){
                        echo '<a href="index.php"> Connexion validé, rendez-vous à l\'acceuil</a>';
                    }
                    echo '<div class="login-form">
                        <form method="post">
                        <div class="form-group">
                        <label>Adresse mail :</label>
                        <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse mail">
                        </div>
                        <div class="form-group mt-2">
                        <label>Mot de passe :</label>
                        <input type="password" class="form-control" name="mot_de_passe" placeholder="Entrez votre mot de passe">
                        </div>
                        <br>
                        <center><button type="submit" class="btn btn-azur"><i class="fa-solid fa-right-to-bracket"></i> Se connecter</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    if(isset($_POST['email']) && isset($_POST['mot_de_passe'])){
        $json = file_get_contents('./database/user.json');
        $donnee = json_decode($json, true);

        foreach($donnee as $uid => $user){
            if ($user['role_uid'] != ""){
                if($user['email'] === $_POST['email']){
                    //if(password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])){
                        $_SESSION['uid'] = $uid;
                        $_SESSION['nom'] = $user['nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['mot_de_passe'] = $user['mot_de_passe'];
                        $_SESSION['role_uid'] = $user['role_uid'];
                        header("Refresh:0");
                    /*}
                    else {
                        echo "Mot de passe incorrect.";              
                    }*/
                }
                }
            else{
                echo "Votre rôle n'a pas été accepté par le responsable du service.";
            }
        }
        header("Refresh:0");
    }
    echo'
    <div class="text-center">
    <br>
    <p> Pas encore inscrit : <a href="inscription.php"> Inscrivez-vous </a> </p>
    <br>
    </div>
    ';
}
?>
