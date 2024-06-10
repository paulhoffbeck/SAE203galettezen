<?php
function updateActivityNow(){
    $data = json_decode(file_get_contents('./database/user.json'), true);
    $data[$_SESSION['uid']]['last_activity'] = time();
    file_put_contents('./database/user.json', json_encode($data, JSON_PRETTY_PRINT));
}
if(isset($_SESSION['uid'])){
    updateActivityNow();
}

function modifjson(){
    if(isset($_POST['ma_checkbox']) && $_POST['ma_checkbox'] == '1') {
        // Charge le contenu du fichier JSON
        $data = file_get_contents('fichier.json');
        // Convertit le JSON en tableau associatif
        $jsonArray = json_decode($data, true);
        // Modifie les données selon vos besoins
        $jsonArray['modification'] = 'Ceci est une modification';
        // Convertit le tableau associatif en JSON
        $jsonData = json_encode($jsonArray);
        // Écrit les données dans le fichier JSON
        file_put_contents('fichier.json', $jsonData);
        echo "Le fichier JSON a été modifié avec succès !";
    }
}

function collaborateur(){ ?>

    <?php

    // Création du tableau
        $json = file_get_contents('./database/role.json');
        $roles = json_decode($json, true);
    echo '<div class="container-fluid mb-5">
    <h1 class="my-4">Liste de nos collaborateurs</h1>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <form method="post">
                    <th class="bg-ciel border-ciel">Filtre</th>
                    <th class="bg-ciel border-ciel"><input class="bg-ciel border-0" type="text" name="nom" placeholder="Chercher par Nom"></th>
                    <th class="bg-ciel border-ciel"><input class="bg-ciel border-0" type="text" name="prenom" placeholder="Chercher par Prénom"></th>
                    <th class="bg-ciel border-ciel"><select class="bg-ciel border-0" type="text" name="poste">
                        <option value="">Chercher par rôle</option>';
                        foreach ($roles as $key => $role) {
                        echo '<option value="'.$key.'">'.$role['name'].'</option>';}
                    echo'</th>
                    <th class="bg-ciel border-ciel"><input class="bg-ciel border-0" type="email" name="email" placeholder="Chercher par Email"></th>
                    <th class="bg-ciel border-ciel"><input class="bg-ciel border-0" type="tel" name="telephone" placeholder="Chercher par Téléphone"></th>
                    <th class="bg-ciel border-ciel"><button type="submit" name="rechercher" class="btn btn-sm btn-pastel">Appliquer</button></th>
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
        if( !empty($user['role_uid'])
            && ((empty($nom) || strtolower($nom) == strtolower($user['nom']))
            && (empty($prenom) || strtolower($prenom) == strtolower($user['prenom']))
            && (empty($email) || strtolower($email) == strtolower($user['email']))
            && (empty($telephone) || $telephone == $user['telephone'])
            && (empty($poste) || $poste == $user['role_uid']))
            ){

            echo'<tr>';
                if(file_exists('./img/collaborateur/'. $key .'.png')){
                    echo '<td> <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" class="profile-img" src="./img/collaborateur/'.$key.'.png" width="28px"> </td>';}
                else{
                    echo '<td> <img src="./img/collaborateur/pasdepp.png" width="28px"> </td>';} 
                echo '</td>
                <td>'. $user['nom'].'</td>
                <td>'. $user['prenom'].'</td> 
                <td>'. getRoleName($user['role_uid']) .'<br><small>'. $user['poste'].'</small></td>
                <td><a href="mailto:'. $user['email'].'">'. $user['email'].'</a></td> 
                <td>'.$user['telephone'].'</td>
                <td> <button type="button" class="btn btn-sm btn-ciel" data-bs-toggle="modal" data-bs-target="#'.$key.'"> Profil </button></td>
            </tr> ';
        }
    }
    echo'</tbody></table></div></div>';


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
}






?>