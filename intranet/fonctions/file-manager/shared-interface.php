<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php

function loadJson($filename) {
    $data = file_get_contents($filename);
    return json_decode($data, true);
}
function getNameOfUserByID($userUID){
    $json = file_get_contents('../../database/user.json');
    $donnee = json_decode($json, true);
    if(isset($donnee[$userUID])){
        return $donnee[$userUID]['prenom'].' '.strtoupper($donnee[$userUID]['nom']);
    }else{
        return "Inconnu";
    }
}
function getNameOfRoleByID($roleUID){
    $json = file_get_contents('../../database/role.json');
    $donnee = json_decode($json, true);
    if(isset($donnee[$roleUID])){
        return $donnee[$roleUID]['name'];
    }else{
        return "Inconnu";
    }
}

function Aff_Users_Options(){
    $userTable = loadJson('../../database/user.json');
    $options = "";
    foreach ($userTable as $key => $user) {
        if ($user["role_uid"] != "") {
            $options .= "<option value='user-$key'>".strtoupper($user["nom"])." ".$user["prenom"]."</option>";
        }
    }
    return $options;
}
function Aff_Roles_Options(){
    $roleTable = loadJson('../../database/role.json');
    $options = "";
    foreach ($roleTable as $key => $role) {
        $options .= "<option value='role-$key'>{$role["name"]}</option>";
    }
    return $options;
}
function PermissionsEditorShared($data,$typeANDuid){
    $perms = array(
        "upload" => array(
            "description" => "Téléverser des fichiers depuis son appareil vers la ressource et les enfants héritiers de celle-ci.",
            "icon" => "<i class='fa-solid fa-download'></i>"
        ),
        "download" => array(
            "description" => "Téléverser des fichiers depuis la ressource et les enfants héritiers de celle-ci vers son appareil.",
            "icon" => "<i class='fa-solid fa-upload'></i>"
        ),
        "perms" => array(
            "description" => "Modifier les droits la ressource et les enfants héritiers de celle-ci.",
            "icon" => "<i class='fa-solid fa-scale-balanced'></i>"
        ),
        "rename" => array(
            "description" => "Renommer la ressource et les enfants héritiers de celle-ci.",
            "icon" => "<i class='fa-solid fa-pencil'></i>"
        ),
        "delete" => array(
            "description" => "Supprimer la ressource et les enfants héritiers de celle-ci.",
            "icon" => "<i class='fa-solid fa-trash-can'></i>"
        )
    );
    $interface = "<div class=\"btn-group text-center\" role=\"group\" aria-label=\"Accès de $typeANDuid\">";
    foreach ($perms as $perm => $caracteristiques) {
        $checked = "";
        if(in_array($perm,$data[$typeANDuid])){
            $checked = "checked";
        }
        $interface .= "<input type=\"checkbox\" class=\"btn-check\" id=\"$perm-perm-$typeANDuid\" perm-name=\"$perm\" typeANDuid=\"$typeANDuid\" onclick=\"addMemberShare(this,'edit')\" autocomplete=\"off\" value=\"$perm\" $checked>
        <label class=\"btn btn-sm btn-outline-secondary\" for=\"$perm-perm-$typeANDuid\" title=\"{$caracteristiques['description']}\">{$caracteristiques['icon']}</label>";
    }
    $interface .= "</div>";
    return $interface;

}

function getSharedInterface($data){
    if(isset($data)){
        $interface = "<div class=\"input-group\"><select id=\"selecteurUserRole\" class=\"form-control\">";
        $interface .= "<optgroup label=\"Utilisateurs\">";
        $interface .= Aff_Users_Options();
        $interface .= "</optgroup>";
        $interface .= "<optgroup label=\"Rôles\">";
        $interface .= Aff_Roles_Options();
        $interface .= "</optgroup>";
        $interface .= "</select><button class=\"btn btn-outline-ciel\" onclick=\"addMemberShare(this,'add')\"><i class=\"fa-solid fa-user-plus\"></i></button></div>";
        $interface .= "<table class=\"table\"><thead><tr><th>Nom</th><th>Action</th></tr></thead><tbody>";
        foreach($data as $uid => $permissions){
            if (strpos($uid, 'user-') === 0) {
                $interface.= '<form><tr><td>'.getNameOfUserByID(str_replace('user-', '', $uid)).'</td><td>';
                $interface.= PermissionsEditorShared($data,$uid);
                $interface.= '<button class="btn btn-outline-danger btn-sm" onclick="addMemberShare(this,\'remove\')" typeANDuid="'.$uid.'"><i class="fa-solid fa-user-minus"></i></button></td></tr></form>';
            }
        }
        foreach($data as $uid => $permissions){
            if (strpos($uid, 'role-') === 0) {
                $interface.= '<form><tr><td>Role "'.getNameOfRoleByID(str_replace('role-', '', $uid)).'"</td><td>';
                $interface.= PermissionsEditorShared($data,$uid);
                $interface.= '<button class="btn btn-outline-danger btn-sm" onclick="addMemberShare(this,\'remove\')" typeANDuid="'.$uid.'"><i class="fa-solid fa-user-minus"></i></button></td></tr></form>';
            }
        }
        $interface .= "</tbody></table>";
        return $interface;
    }else{
        return "Erreur";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if(isset($data['sharedData'])){
        echo getSharedInterface($data['sharedData']);
    }else{
        echo "<div class=\"alert alert-info mt-3 mb-2\"><b>Erreur : </b>Impossible de charger le menu, veuillez actualiser la page.</div>";
    }
} ?>