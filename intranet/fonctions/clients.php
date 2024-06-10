<?php

function client(){ 

    $json = file_get_contents('./database/clients.json');
    $donnee = json_decode($json, true);
    file_put_contents('./database/clients.json', json_encode($donnee, JSON_PRETTY_PRINT));
    echo '<div class="container-fluid mb-5">
    <h1 class="my-4">Liste de nos clients à travers le monde</h1>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de Naissance</th>
                <th>Adresse Mail</th>
                <th>Type</th>
                <th>Téléphone</th>
                <th>Pays</th>
                <th>Ville</th>
                <th>Télécharger</th>
            </tr>
        </thead>
    <tbody>';
    foreach ($donnee as $key => $user) {
        echo '<tr>
        <td>'. strtoupper($user['nom']).'</td>
        <td>'. $user['prenom'].'</td> 
        <td>'. $user['date_de_naissance'].'</td>
        <td><a href="mailto:'. $user['email'].'">'. $user['email'].'</td> 
        <td>'. $user['entreprise_ou_particuliers'].'</td> 
        <td>'.$user['telephone'].'</td>
        <td>'.$user['adresse']['pays'].'<br><small>'. $user['langue'].'</small></td>
        <td>'.$user['adresse']['ville'].', '.$user['adresse']['code_postal'].'<br><small>'. $user['adresse']['rue'].'</small></td>
        <td><a href="telechargement.php?key='.$key.'"><i class="fa-solid fa-download"></i></a></td>
        </tr>';
    }
    echo '</tbody></table></div></div>
    ';
}
?>
