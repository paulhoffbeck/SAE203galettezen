
<link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
require_once("../main.php");
$DB_files = loadJson('../../database/files.json');
$elementUID = "66535a7e0708b";

function getTexteNameShared($userUID){
    $json = file_get_contents('../../database/user.json');
    $donnee = json_decode($json, true);
    if(isset($donnee[$userUID])){
        return $donnee[$userUID]['prenom'].' '.strtoupper($donnee[$userUID]['nom']);
    }else{
        return "Inconnu";
    }
}
$exeptUserListe[] = $DB_files[$elementUID]['owner'];
if (isset($DB_files[$elementUID]['share']['access'])) {
    $exeptUserListe = array_merge($exeptUserListe, array_keys($DB_files[$elementUID]['share']['access']));
}
function Aff_Users_Options($exeptUserListe){
    
    $userTable = loadJson('../../database/user.json');
    foreach ($userTable as $key => $user) {
        if ($user["role_uid"] != "" && !in_array($key, $exeptUserListe)) {
            echo("<option value='".$key."'>".strtoupper($user["nom"])." ".$user["prenom"]."</option>");
        }
    }
}
function Aff_Roles_Options(){
    $roleTable = loadJson('../../database/role.json');
    foreach ($roleTable as $key => $role) {
        echo("<option value='".$key."'>".$role["name"]."</option>");
    }
}
?>
<table class="table">
<thead><tr><th>Nom</th><th>Action</th></tr></thead>
<tbody id="userTableBody">
    <tr>
        <td>
            <select class="form-control form-control-sm" id="userSelect">
                <optgroup label="Utilisateurs">
                    <?php Aff_Users_Options($exeptUserListe) ?>
                </optgroup>
                <optgroup label="Groupes" disabled>
                    <?php Aff_Roles_Options() ?>
                </optgroup>
            </select>
        </td>
        <td><span class="btn btn-sm btn-ciel" id="addButton">+</span></td>
    </tr>
    <?php
    if (isset($DB_files[$elementUID]['share']['access'])) {
        foreach($DB_files[$elementUID]['share']['access'] as $uid => $access){
            echo '
            <tr id="row-'.$uid.'">
                <td id="user-'.$uid.'" data-username="'.getTexteNameShared($uid).'">'.getTexteNameShared($uid).'</td>
                <td>
                    <div class="btn-group text-center" role="group" aria-label="Accès de '.$uid.'">
                        <input type="checkbox" class="btn-check" id="upload-perm-'.$uid.'" autocomplete="off" name="share[access]['.$uid.'][]" value="upload">
                        <label class="btn btn-sm btn-outline-secondary" for="upload-perm-'.$uid.'" title="Téléverser des fichiers depuis son appareil vers la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-download"></i></label>
                        <input type="checkbox" class="btn-check" id="download-perm-'.$uid.'" autocomplete="off" name="share[access]['.$uid.'][]" value="download">
                        <label class="btn btn-sm btn-outline-secondary" for="download-perm-'.$uid.'" title="Téléverser des fichiers depuis la ressource et les enfants héritiers de celle-ci vers son appareil."><i class="fa-solid fa-upload"></i></label>
                        <input type="checkbox" class="btn-check" id="perms-perm-'.$uid.'" autocomplete="off" name="share[access]['.$uid.'][]" value="perms">
                        <label class="btn btn-sm btn-outline-secondary" for="perms-perm-'.$uid.'" title="Modifier les droits la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-scale-balanced"></i></label>
                        <input type="checkbox" class="btn-check" id="rename-perm-'.$uid.'" autocomplete="off" name="share[access]['.$uid.'][]" value="rename">
                        <label class="btn btn-sm btn-outline-secondary" for="rename-perm-'.$uid.'" title="Renommer la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-pencil"></i></label>
                        <input type="checkbox" class="btn-check" id="delet-perm-'.$uid.'" autocomplete="off" name="share[access]['.$uid.'][]" value="delet">
                        <label class="btn btn-sm btn-outline-secondary" for="delet-perm-'.$uid.'" title="Supprimer la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-trash-can"></i></label>
                    </div>
                    <button class="btn btn-outline-danger btn-sm removeButton" data-value="'.$uid.'"><i class="fa-solid fa-user-minus"></i></button>
                </td>
            </tr>';
        }
    } ?>
    <!-- Les lignes ajoutées dynamiquement iront ici -->
</tbody>
</table>