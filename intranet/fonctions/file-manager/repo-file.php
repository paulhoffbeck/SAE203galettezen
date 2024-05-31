<?php
$_ENV['FILE_REPOSITORY'] = "/var/repository/";

function loadJson($filename) {
    $data = file_get_contents($filename);
    return json_decode($data, true);
}
function saveJson($filename, $data) {
    function compareByTypeAndName($a, $b) {
        if ($a['type'] === 'folder' && $b['type'] !== 'folder') {
            return -1;
        } elseif ($a['type'] !== 'folder' && $b['type'] === 'folder') {
            return 1;
        }
        return strcasecmp($a['name'], $b['name']);
    }
    function sortArrayByTypeAndName(&$data) {
        uasort($data, 'compareByTypeAndName');
    }
    sortArrayByTypeAndName($data);
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filename, $jsonData);
}

///////////////////////////////////////////////////////////////
////             Fonctions de Réponse aux POST             ////
///////////////////////////////////////////////////////////////
function CreateFolder($post){
    $DB_files = loadJson('database/files.json');
    try{
        $uid = uniqid();
        $DB_files[$uid] = array(
            'name' => $post['name'],
            "parent_uid" => $post['parent_uid'],
            "type" => "folder",
            "owner" => $_SESSION['uid'],
            "share" => array( "type" => "private")
        );
        saveJson('database/files.json', $DB_files);
        return "<div class='alert alert-success'>Vous avez créez avec le dossier {$post['name']} !</div>";
    }
    catch (\Exception $e){
        return "<div class='alert alert-warning'>Une erreur est arrivée lors de la création de votre dossier...</div>";
    }
}
function UploadFile($post, $files){
    $DB_files = loadJson('database/files.json');
    try {
        foreach ($files['file']['tmp_name'] as $index => $fileTmpPath) {
            $fileName = $files['file']['name'][$index];
            $fileSize = $files['file']['size'][$index];
            if ($files['file']['error'][$index] == UPLOAD_ERR_OK) {
                $uid = uniqid();
                $dest_path = $_ENV['FILE_REPOSITORY'] . $uid;
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $DB_files[$uid] = array(
                        'name' => $fileName, // le nom original du fichier
                        'parent_uid' => $post['parent_uid'],
                        'type' => 'file',
                        'owner' => $_SESSION['uid'],
                        'size' => $fileSize,
                        'share' => array('type' => 'private')
                    );
                }
            }
        }
        saveJson('database/files.json', $DB_files);
        // echo '<script type="text/javascript">location.reload();</script>';
    } catch (\Exception $e) {
        echo "<div class='alert alert-warning'>Une erreur est survenue lors du transfert de votre fichier...</div>";
    }
}
if(isset($_POST['savePermissions'])) {
    $elementUID = $_POST['savePermissions'];
    $DB_files = loadJson('database/files.json');
    $DB_files[$elementUID]['share'] = $_POST['share'];
    saveJson('database/files.json', $DB_files);
}
if(isset($_POST['renameElement'])){
    $elementUID = $_POST['renameElement'];
    $DB_files = loadJson('database/files.json');
    $DB_files[$elementUID]['name'] = $_POST['NewName'];
    saveJson('database/files.json', $DB_files);
}
if(isset($_POST['create_shortcut'])){
    $elementUID = $_POST['create_shortcut'];
    $uid = uniqid();
    $DB_files = loadJson('database/files.json');
    $DB_files[$uid]['name'] = $DB_files[$elementUID]['name']." - raccourci";
    $DB_files[$uid]['type'] = "shortcut";
    $DB_files[$uid]['parent_uid'] = $DB_files[$elementUID]['parent_uid'];
    $DB_files[$uid]['link'] = $elementUID;
    $DB_files[$uid]['owner'] = $_SESSION['uid'];
    $DB_files[$uid]['share']['type'] = "private";
    saveJson('database/files.json', $DB_files);
}
if(isset($_POST['move_file_here'])){
    $DB_files = loadJson('database/files.json');
    $move_file = $_POST['move_file_here'];
    if($DB_files[$move_file]['owner'] == $_SESSION['uid']){
        $move_file = $_GET['move'];
        $DB_files[$move_file]['parent_uid'] = $_GET['path'];
        saveJson('database/files.json', $DB_files);
    }
    header('Location: ?path='.$_GET['path']);
}

function Aff_Users_Options(){
    $userTable = loadJson('database/user.json');
    foreach ($userTable as $key => $user) {
        if ($user["role_uid"]!="") {
            echo("<option value='".$key."'>".strtoupper($user["nom"])." ".$user["prenom"]."</option>");
        }
    }
}
function Aff_Roles_Options(){
    $roleTable = loadJson('database/role.json');
    foreach ($roleTable as $key => $role) {
        echo("<option value='".$key."'>".$role["name"]."</option>");
    }
}
