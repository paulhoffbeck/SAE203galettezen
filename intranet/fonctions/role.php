<?php
echo "test2";
function databaseRoleLoader(){  
    $json = file_get_contents('../database/role.json'); 
    return json_decode($json,true);
}
function createRole($name){
    $json = file_get_contents('../database/role.json'); 
    $DB_role = json_decode($json,true);
    var_dump($DB_role);
}
?>