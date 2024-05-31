<?php
function updateActivityNow(){
    $data = json_decode(file_get_contents('./database/user.json'), true);
    $data[$_SESSION['uid']]['last_activity'] = time();
    file_put_contents('./database/user.json', json_encode($data, JSON_PRETTY_PRINT));
}
if(isset($_SESSION['uid'])){
    updateActivityNow();
}

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

    // Création du tableau
        $json = file_get_contents('./database/role.json');
        $roles = json_decode($json, true);
    echo '<div class="container mb-5">
    <h1 class="my-4">Liste de nos collaborateurs</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <form method="post">
                    <th class="bg-turquoise border-turquoise">Filtre</th>
                    <th class="bg-turquoise border-turquoise"><input class="bg-turquoise border-0" type="text" name="nom" placeholder="Chercher par Nom"></th>
                    <th class="bg-turquoise border-turquoise"><input class="bg-turquoise border-0" type="text" name="prenom" placeholder="Chercher par Prénom"></th>
                    <th class="bg-turquoise border-turquoise"><select class="bg-turquoise border-0" type="text" name="poste">
                        <option value="">Chercher par rôle</option>';
                        foreach ($roles as $key => $role) {
                        echo '<option value="'.$key.'">'.$role['name'].'</option>';}
                    echo'</th>
                    <th class="bg-turquoise border-turquoise"><input class="bg-turquoise border-0" type="email" name="email" placeholder="Chercher par Email"></th>
                    <th class="bg-turquoise border-turquoise"><input class="bg-turquoise border-0" type="tel" name="telephone" placeholder="Chercher par Téléphone"></th>
                    <th class="bg-turquoise border-turquoise"><button type="submit" name="rechercher" class="btn btn-pastel">Appliquer</button></th>
                </form>
            </tr>
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

    // Condition pour les traitement
    $json = file_get_contents('./database/user.json');
    $donnee = json_decode($json, true);

    extract($_POST);
    foreach ($donnee as $key => $user) {
        if((!empty($nom) && strtolower($nom) == strtolower($user['nom']))
            ||(!empty($prenom) && strtolower($prenom) == strtolower($user['prenom']))
            ||(!empty($email) && strtolower($email) == strtolower($user['email']))
            ||(!empty($telephone) && $telephone == $user['telephone'])
            ||(!empty($poste) && $poste == $user['role_uid']
            ||(empty($nom) && empty($prenom) && empty($email) && empty($telephone) && empty($poste)))
            ){

            echo'<tr>';
            if(file_exists('./img/collaborateur/'. $key .'.png')){
                echo '<td> <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="./img/collaborateur/'.$key.'.png" width="28px"> </td>';}
            else{
                echo '<td> <img src="./img/collaborateur/pasdepp.png" width="28px"> </td>';} 
            echo '</td>
            <td>'. $user['nom'].'</td>
            <td>'. $user['prenom'].'</td> 
            <td>'. $role['name'] .'<br>'. $user['poste'].'</td>
            <td>'. $user['email'].'</td> 
            <td>'.$user['telephone'].'</td>
            <td> <button type="button" class="btn btn-sm btn-ciel" data-bs-toggle="modal" data-bs-target="#'.$key.'"> Profil </button>';
            if($_SESSION['uid'] == $key){
                echo '<button type="button" class="btn btn-sm btn-azur" data-bs-toggle="modal" data-bs-target="#'.$key.'1"> Modification </button></td>';
            }
            echo '</td>
            </tr> ';
        }
    }
    echo'</tbody></table></div>';


    // création des modaux
    $json = file_get_contents('./database/user.json');
    $donnee = json_decode($json, true);

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
                            <input type="hidden" name="uid" value="'.$key.'">
                            <button type="submit" class="btn btn-azur">Valider</button>
                        </form>';
                    echo '</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>';
    }
    
    if(isset($_POST['mot_de_passe1']) && isset($_POST['mot_de_passe1'])){
        if(($_POST['mot_de_passe1']) === $_POST['mot_de_passe2']){
            $json = file_get_contents('./database/user.json');
            $donnee = json_decode($json, true);

            $mdphash = password_hash($_POST['mot_de_passe2'], PASSWORD_DEFAULT);

            $donnee[$_POST['uid']]['mot_de_passe'] = $mdphash;

            $json = json_encode($donnee, JSON_PRETTY_PRINT);
            $cheminFichier = './database/user.json';
            file_put_contents($cheminFichier, $json);
        }
    }
}
?>