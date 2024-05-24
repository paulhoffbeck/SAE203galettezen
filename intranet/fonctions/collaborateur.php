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
                echo '<td> <button type="button" class="btn btn-sm btn-ciel" data-bs-toggle="modal" data-bs-target="#'.$key.'">
                Profil
              </button> </td>';
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
    
}


?>