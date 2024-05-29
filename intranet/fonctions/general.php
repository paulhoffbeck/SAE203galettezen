<?php
function getUserNameByUid($userUID){
    $json = file_get_contents('./database/user.json');
    $donnee = json_decode($json, true);
    if(isset($donnee[$userUID])){
        return $donnee[$userUID]['prenom'].' '.strtoupper($donnee[$userUID]['nom']);
    }else{
        return "Inconnu";
    }
}
?>