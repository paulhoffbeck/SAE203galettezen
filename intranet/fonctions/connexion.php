<?php
function connexion(){
    echo '
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <p> Connectez-vous pour accéder à l\'intranet </p>
                    <div class="login-form">
                        <form method="post">
                        <div class="form-group">
                        <label>Utilisateur :</label>
                        <input type="text" class="form-control" name="utilisateur" placeholder="Entrez votre nom d\'utilisateur">
                        </div>
                        <div class="form-group">
                        <label>Mot de passe :</label>
                        <input type="password" class="form-control" name="motdepasse" placeholder="Entrez votre mot de passe">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    if(isset($_POST['utilisateur']) && isset($_POST['motdepasse'])){
        $json = file_get_contents('./data/user.json');
        $donnee = json_decode($json, true);

        foreach($donnee as $user){
            if ($user['role'] != ""){
                if($user['utilisateur'] === $_POST['utilisateur']){
                    if(password_verify($_POST['motdepasse'], $user['motdepasse'])){
                        $_SESSION['iud'] = $user['iud'];
                        $_SESSION['nom'] = $user['nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        $_SESSION['motdepasse'] = $user['motdepasse'];
                        $_SESSION['role_uid'] = $user['role_uid'];
                        echo "<a href='index.php'> Connexion validé</a>";
                        header("Refresh:0");
                        return;
                    }
                    else {
                        echo "Mot de passe incorrect.";              
                    }
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
