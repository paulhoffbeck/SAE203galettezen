<?php
function iconTypeShared($type) {
    $icons = [
        "private" => '<i class="fa-solid fa-lock text-danger" title="Privé"></i>',
        "shared" => '<i class="fa-solid fa-unlock text-warning" title="Partagé"></i>',
        "public" => '<i class="fa-solid fa-lock-open text-success" title="Public"></i>',
        "herited" => '<i class="fa-regular fa-circle-question" title="Hérite du parent"></i>',
    ];
    return $icons[$type] ?? '';
}
function textTypeShared($type) {
    $text = [
        "private" => '<i class="fa-solid fa-lock text-danger"></i> Privé(e)',
        "shared" => '<i class="fa-solid fa-unlock text-warning"></i> Partagé(e)',
        "public" => '<i class="fa-solid fa-lock-open text-success"></i> Public',
        "herited" => '<i class="fa-regular fa-circle-question"></i> Hérite',
    ];
    return $text[$type] ?? '';
}
function textIconTypeResssource($type){
    $text = [
        'folder' => "<i class='fa-solid fa-folder-closed'></i> Dossier",
        'file' => "<i class='fa-regular fa-file-lines'></i> Fichier",
        'shortcut' => "<i class='fa-solid fa-up-right-from-square'></i> Raccourci"
    ];
    return $text[$type];
}
function breadcrumb($elementUID){
    $DB_files = loadJson('database/files.json');
    if(isset($DB_files[$elementUID])){
        if($DB_files[$elementUID]['parent_uid'] != "racine"){
            return breadcrumb($DB_files[$elementUID]['parent_uid']).'<li class="breadcrumb-item"><a href="?path='.$elementUID.'" class="text-decoration-none text-azur">'.$DB_files[$elementUID]['name'].'</a></li>';
        }else{
            return '<li class="breadcrumb-item"><a href="?path='.$elementUID.'" class="text-decoration-none text-azur">'.$DB_files[$elementUID]['name'].'</a></li>';
        }
    }
}
function formatSize($octets) {
    return number_format($octets / 1024, 0) . 'Ko';
}
?>