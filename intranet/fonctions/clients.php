<?php
function client(){ 

  //Affichage du tableau
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
    <td>
      <div class="mb-1">
        <form method="POST"> 
            <input type="hidden" name="elementasup" value="'.$key.'">
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#'.$key.'">Modification</button>
    </td>
    </tr>';
  }
  echo '</tbody></table></div></div>';

  //Modal d'ajout d'utilisateur
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
                <h4>Adresse e-mail</h4>
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
                <h4>Langue</h4>
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
                <div class="centre">
                  <button type="submit" name="creation" class="btn btn-primary">Ajouter le client</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
         <button type="button" name="creation"class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>';

  //traitement d'ajout d'utilisateur
  if (isset($_POST["creation"])) {
    var_dump($_POST);
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

  //Modaux pour modifier les clients
  $json = file_get_contents('./database/clients.json');
  $donnee = json_decode($json, true);
  foreach ($donnee as $key => $clients) {
  echo '
  <div class="modal fade" id="'.$key.'" tabindex="-1" aria-labelledby="'.$key.'Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="'.$key.'Label">'.$clients['nom'] .' '. $clients['prenom'] .'</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form method="POST">
              <h4>Nom</h4>
              <input value="'.$clients['nom'].'" name="nom" class="form-control" required>
              <br>
              <h4>Prénom</h4>
              <input value="'.$clients['prenom'].'"  name="prenom" class="form-control" required>
              <br>
              <h4>Date de naissance</h4>
              <input type="date" value="'.$clients['date_de_naissance'].'" name="date_de_naissance" class="form-control" required>
              <br>
              <h4>Adresse e-mail</h4>
              <input value="'.$clients['email'].'" name="email" class="form-control" required>
              <br>
              <h4>Type de client</h4>
              <select class="border-1 rounded form-control" name="entreprise_ou_particuliers" required>
                  <option value="'.$clients['entreprise_ou_particuliers'].'">'.$clients['entreprise_ou_particuliers'].'</option>
                  <option value="Particuliers">Particuliers</option>
                  <option value="Entreprises">Entreprises</option>
              </select>
              <br>
              <h4>Numéro de téléphone</h4>
              <p>Format XX-XX-XX-XX-XX</p>
              <input type="tel" value="'.$clients['telephone'].'" name="telephone" class="form-control" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required>
              <br>
              <h4>Pays</h4>
              <input value="'.$clients['adresse']['pays'].'" name="pays" class="form-control" required>
              <br>
              <h4>Langue</h4>
              <input value="'.$clients['langue'].'" name="langue" class="form-control" required>
              <br>
              <h4>Ville</h4>
              <input value="'.$clients['adresse']['ville'].'" name="ville" class="form-control" required>
              <br>
              <h4>Code Postal</h4>
              <input value="'.$clients['adresse']['code_postal'].'" name="code_postal" class="form-control" required>
              <br>
              <h4>Rue</h4>
              <input value="'.$clients['adresse']['rue'].'" name="rue" class="form-control" required>
              <input type="hidden" name="key" value="'.$key.'">
              <button type="submit" name="modification" class="btn btn-primary">Modifier le client</button>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div></div>';}

  //Traitement de la modification
  if(isset($_POST["modification"])) {
    $json = file_get_contents('./database/clients.json');
    $donnee = json_decode($json, true);

    $key = $_POST["key"];

    $donnee[$key] = array(
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

    $file = json_encode($donnee, JSON_PRETTY_PRINT);
    file_put_contents("./database/clients.json", $file);
  }

}

//Fonction supprimer
function supprimer($uid){
  $json = file_get_contents('./database/clients.json');
  $donnee = json_decode($json, true);

  unset($donnee[$uid]);

  $file = json_encode($donnee, JSON_PRETTY_PRINT);
  file_put_contents("./database/clients.json", $file);
  header("refresh:1;url=clients.php");
}
?>