<?php
function client(){ 
    $json = file_get_contents('./database/clients.json');
    $donnee = json_decode($json, true);
    file_put_contents('./database/clients.json', json_encode($donnee, JSON_PRETTY_PRINT));
    echo '<div class="container-fluid mb-5">
    <h1 class="my-4">Liste de nos clients à travers le monde</h1>
    <div class="table-responsive">';
    echo '<table class="table table-striped table-bordered table-hover">
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
                <th class="bg-pastel border-0">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        +
                    </button>
                </th>
            </tr>
        </thead>
    <tbody>';

echo '
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un nouveau client</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form method="POST">
                <h4>Nom</h4>
                <input placeholder="Nom" name="nom" class="form-control" required>
                <br>
                <h4>Prénom</h4>
                <input placeholder="Prénom" name="prenom" class="form-control" required>
                <br>
                <h4>Date de naissance</h4>
                <input type="date" placeholder="Date de naissance" name="date_de_naissance" class="form-control" required>
                <br>
                <h4>Adresse Mail</h4>
                <input placeholder="Email" name="email" class="form-control" required>
                <br>
                <h4>Type de client</h4>
                <select class="border-1 rounded form-control" name="entreprise_ou_particuliers" required>
                    <option value="">Chercher par rôle</option>
                    <option value="Particuliers">Particuliers</option>
                    <option value="Entreprises">Entreprises</option>
                </select>
                <br>
                <h4>Numéro de téléphone</h4>
                <input placeholder="Téléphone" name="telephone" class="form-control" required>
                <br>
                <h4>Pays</h4>
                <input placeholder="Pays" name="pays" class="form-control" required>
                <br>
                <h4>Langues</h4>
                <input placeholder="Langue" name="langue" class="form-control" required>
                <br>
                <h4>Ville</h4>
                <input placeholder="Ville" name="ville" class="form-control" required>
                <br>
                <h4>Code Postal</h4>
                <input placeholder="Code Postal" name="code_postal" class="form-control" required>
                <br>
                <h4>Rue</h4>
                <input placeholder="Rue" name="rue" class="form-control" required>
                <button type="submit" class="btn btn-primary">Ajouter le client</button>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
';

if (isset($_POST["nom"])) {
    $uid = uniqid();

    $json = file_get_contents('./database/clients.json');
    $donnee = json_decode($json, true);

    $data = array(
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "date_de_naissance" => $_POST['date_de_naissance'],
        "telephone" => $_POST['telephone'],
        "email" => $_POST['email'],
        "adresse" => array(
            "pays" => $_POST['pays'],
            "code_postal" => $_POST['code_postal'],
            "ville" => $_POST['ville'],
            "rue" => $_POST['rue'],
        ),
        "entreprise_ou_particuliers" => $_POST['entreprise_ou_particuliers'],
        "langue" => $_POST['langue']
    );
    $donnee[$uid] = $data;
    $file = json_encode($donnee, JSON_PRETTY_PRINT);
    file_put_contents("./database/clients.json", $file);
}

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
    echo '</tbody></table></div></div>';
}

?>