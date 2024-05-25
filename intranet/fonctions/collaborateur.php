<?php

function collaborateur(){
    ?>
    <script>
    //Fonction JS pour agrandir la photo de profil dans le tableau
    function bigImg(x) {
        x.style.height = "100px";
        x.style.width = "100px";
        }
    function normalImg(x) {
        x.style.height = "28px";
        x.style.width = "28px";
        }
    </script>

    <?php
    $json = file_get_contents('./database/user.json');
    $users = json_decode($json, true);

    function chercherNom($users, $nom) {
        $resultats = [];
        foreach ($users as $key => $user) {
            if (stripos($user['nom'], $nom) !== false) {
                $resultats[$key] = $user;
            }
        }
        return $resultats;
    }
    function chercherPrenom($users, $prenom) {
        $resultats = [];
        foreach ($users as $key => $user) {
            if (stripos($user['prenom'], $prenom) !== false) {
                $resultats[$key] = $user;
            }
        }
        return $resultats;
    }
    function chercherPoste($users, $poste) {
        $resultats = [];
        foreach ($users as $key => $user) {
            if (stripos($user['poste'], $poste) !== false) {
                $resultats[$key] = $user;
            }
        }
        return $resultats;
    }
    function chercherEmail($users, $email) {
        $resultats = [];
        foreach ($users as $key => $user) {
            if (stripos($user['email'], $email) !== false) {
                $resultats[$key] = $user;
            }
        }
        return $resultats;
    }
    function chercherTelephone($users, $telephone) {
        $resultats = [];
        foreach ($users as $key => $user) {
            if (stripos($user['telephone'], $telephone) !== false) {
                $resultats[$key] = $user;
            }
        }
        return $resultats;
    }

    // Formulaire de recherche
    echo '
    <div class="text-center">
        <h2>Recherche d\'utilisateurs</h2>
        <form method="post">
            <label><button type="submit" class="btn btn-pastel">Nom :</button></label>
            <input class="bg-turquoise border-0" type="text" name="nom">
        </form>
        <form method="post">
            <label><button type="submit" class="btn btn-pastel">Prenom :</button></label>
            <input class="bg-turquoise border-0" type="text" name="prenom">
        </form>
        <form method="post">
            <label><button type="submit" class="btn btn-pastel">Poste :</button></label>
            <input class="bg-turquoise border-0" type="text" name="poste">
        </form>
        <form method="post">
            <label><button type="submit" class="btn btn-pastel">E-mail :</button></label>
            <input class="bg-turquoise border-0" type="email" name="email">
        </form>
        <form method="post">
            <label><button type="submit" class="btn btn-pastel">Téléphone :</button></label>
            <input class="bg-turquoise border-0" type="tel" name="telephone">
        </form>
    </div>';

    if(isset($_POST['nom'])){
        $nomRecherche = $_POST['nom'];
        $resultatsNom = chercherNom($users, $nomRecherche);
        echo '<div class="container mb-5">
            <h2>Résultats de la recherche pour le Nom ('.strtoupper($nomRecherche).')</h2>';
                foreach ($resultatsNom as $key => $user) {
                    echo '<b>Nom: '. $user['nom'].'</b>, Prénom: <b>'. $user['prenom'].'</b>, Poste: <b>'. $user['poste'].'</b>, Email: <b>'. $user['email'].'</b>, Téléphone: <b>'.$user['telephone'].'</b><br>';
                }
        echo'</div>';
    }

    if(isset($_POST['prenom'])){
        $prenomRecherche = $_POST['prenom'];
        $resultatsPrenom = chercherPrenom($users, $prenomRecherche);
        echo '<div class="container mb-5">
            <h2>Résultats de la recherche pour le Prénom ('.$prenomRecherche.')</h2>';
                foreach ($resultatsPrenom as $key => $user) {
                    echo '<b>Prénom: '. $user['prenom'].'</b>, Nom: <b>'. $user['nom'].'</b>, Poste: <b>'. $user['poste'].'</b>, Email: <b>'. $user['email'].'</b>, Téléphone: <b>'.$user['telephone'].'</b><br>';
                }
        echo'</div>';
    }

    if(isset($_POST['poste'])){
        $posteRecherche = $_POST['poste'];
        $resultatsPoste = chercherPoste($users, $posteRecherche);
            echo '<div class="container mb-5">
                <h2>Résultats de la recherche pour le Poste ('.$posteRecherche.')</h2>';
                    foreach ($resultatsPoste as $key => $user){
                        echo '<b>Poste: '. $user['poste'].'</b>, Nom: <b>'. $user['nom'].'</b>, Prénom: <b>'. $user['prenom'].'</b>, Email: <b>'. $user['email'].'</b>, Téléphone: <b>'.$user['telephone'].'</b><br>';
                    }
            echo'</div>';
    }
    
    if(isset($_POST['email'])){
        $emailRecherche = $_POST['email'];
        $resultatsEmail = chercherEmail($users, $emailRecherche);
            echo '<div class="container mb-5">
                <h2>Résultats de la recherche pour le Poste ('.$emailRecherche.')</h2>';
                    foreach ($resultatsEmail as $key => $user){
                        echo '<b>Email: '. $user['email'].'</b>, Nom: <b>'. $user['nom'].'</b>, Prénom: <b>'. $user['prenom'].'</b>, Poste: <b>'. $user['poste'].'</b>, Téléphone: <b>'.$user['telephone'].'</b><br>';
                    }
            echo'</div>';
    }

    if(isset($_POST['telephone'])){
        $telephoneRecherche = $_POST['telephone'];
        $resultatsTelephone = chercherTelephone($users, $telephoneRecherche);
            echo '<div class="container mb-5">
                <h2>Résultats de la recherche pour le Nom ('.$telephoneRecherche.')</h2>';
                    foreach ($resultatsTelephone as $key => $user) {
                        echo 'Téléphone: <b>'.$user['telephone'].'</b>, Nom: <b>'. $user['nom'].'</b>, Prénom: <b>'. $user['prenom'].'</b>, Poste: <b>'. $user['poste'].'</b>, Email: <b>'. $user['email'].'</b><br>';
                    } 
            echo'</div>';
    }

    // Création du tableau
    echo '<div class="container mb-5">
    <h1 class="my-4">Liste de nos collaborateurs</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Poste</th>
                <th>E-mail</th>
                <th>Téléphone</th>
                <th></th>
            </tr>
        </thead>
        <tbody>';

            $json = file_get_contents('./database/user.json');
            $donnee = json_decode($json, true);

            foreach ($donnee as $key => $employee) {
                echo '<tr>';
                if(file_exists('./img/collaborateur/'. $key .'.png')){
                echo '<td> <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="./img/collaborateur/'.$key.'.png" width="28px"> </td>';}
                else{
                echo '<td> <img src="./img/collaborateur/pasdepp.png" width="28px"> </td>';}
                echo '<td>' . strtoupper($employee['nom']) . '</td>';
                echo '<td>' . $employee['prenom'] . '</td>';
                echo '<td>' . $employee['poste'] . '</td>';
                echo '<td>' . $employee['email'] . '</td>';
                echo '<td>' . $employee['telephone'] . '</td>';
                echo '<td> <button type="button" class="btn btn-sm btn-ciel" data-bs-toggle="modal" data-bs-target="#'.$key.'"> Profil </button>';
                if($_SESSION['email'] == $employee['email']){
                    echo '<button type="button" class="btn btn-sm btn-azur" data-bs-toggle="modal" data-bs-target="#'.$key.'1"> Modification </button></td>';
                }
                else{
                    echo'</td>';
                }
                echo '</tr>';
            }
    echo ' </tbody>
    </table></div>';
    // création des modaux
    foreach ($donnee as $key => $employee) {
    echo'<div class="modal fade" id="'.$key.'" tabindex="-1" aria-labelledby="'.$key.'lLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="'.$key.'Label">'.strtoupper($employee['nom']) .' '. $employee['prenom'] .'</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">';
                    // Contenu visible dans le modal
                    if(file_exists('./img/collaborateur/'. $key .'.png')){
                        echo '<img src="./img/collaborateur/'.$key.'.png" width="350px">';}
                    else{
                        echo '<img src="./img/collaborateur/pasdepp.png" width="350px">';}
                    echo'<p> Nom: <b>'.strtoupper($employee['nom']) . '</b><br>
                    Prénom: <b>' . $employee['prenom'] . '</b><br>
                    '.$employee['prenom'].' occupe le poste de <b>' . $employee['poste'] . '</b>.<br>
                    Vous pouvez contacter '.$employee['prenom'].' au <b>' . $employee['telephone'] . '</b>, ou à l\'adresse<b> ' . $employee['email'] . '</b>.<br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>';
    }

    foreach ($donnee as $key => $employee) {
        echo'<div class="modal fade" id="'.$key.'1" tabindex="-1" aria-labelledby="'.$key.'1lLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="'.$key.'1Label"> Modifiez votre profil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">';
                        // Contenu visible dans le modal
                        echo '
                        <form method="post">
                            <div class="form-group">
                                <label>Changez votre mot de passe :</label>
                                <input type="password" class="form-control" name="mot_de_passe1" placeholder="Entrez votre nouveau mot de passe">
                            </div>
                            <div class="form-group">
                                <label>Validez le changement de mot de passe :</label>
                                <input type="password" class="form-control" name="mot_de_passe2" placeholder="Confirmez votre nouveau mot de passe">
                            </div>
                        </form>';
                        /*$json = file_get_contents('./database/user.json');
                        $donnee = json_decode($json, true);
                        
                        if($_POST['mot_de_passe1'] == $_POST['mot_de_passe2']){
                            $employee['mot_de_passse'] = $_POST['mot_de_passe2'];

                            $jason = json_encode($key);
                            $cheminFichier = './database/user.json';
                            file_put_contents($cheminFichier, s$jason);
                        }
                        else { echo "Mot de passe différent";}*/
                    echo '</div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-azur">Valider</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>';
        }
}
?>