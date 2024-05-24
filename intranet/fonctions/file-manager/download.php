<?php 
function FindPermissions($elementUID,$userUID,$permission){
    $DB_files = loadJson('database/files.json');
    if($elementUID === "racine"){
        return true;
    }elseif($DB_files[$elementUID]['owner'] === $userUID || (isset($DB_files[$elementUID]['share']['access']['public']) && in_array($permission, $DB_files[$elementUID]['share']['access']['public'])) || (isset($DB_files[$elementUID]['share']['access'][$userUID]) && in_array($permission, $DB_files[$elementUID]['share'][$userUID]['public']))){
        return true;
    }elseif($DB_files[$elementUID]['share']['type'] === "herited"){
        return FindPermissions($DB_files[$elementUID]['parent_uid'],$userUID,"download");
    }
    return false;
}
function closeWindow(){
    echo '<script>window.close();</script>';
}
function downloaderRessource($elementUID){
    $DB_files = loadJson('database/files.json');
    if(isset($DB_files[$elementUID]) && $DB_files[$elementUID]['type'] == 'file' && FindPermissions($elementUID,$_SESSION['uid'],'download')){
        $file = './uploads/' . $elementUID;
        $downloadFileName = $DB_files[$elementUID]['name'];
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $downloadFileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            closeWindow();
            exit;
        } else {
            return false;
        }
    }else{
        return false;
    }
}

?>