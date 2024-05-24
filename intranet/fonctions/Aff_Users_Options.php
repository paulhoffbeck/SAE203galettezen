<?php
function Aff_Users_Options(){
    $userData = file_get_contents('database/user.json', true);
    $userTable = json_decode($userData, true);

    foreach ($userTable as $key => $user) {
        if ($user["role_uid"]!="") {
            echo("<option value='".$key."'>".$user["nom"]." ".$user["prenom"]."</option>");
            echo("<br>");
        }
    }
}

?>