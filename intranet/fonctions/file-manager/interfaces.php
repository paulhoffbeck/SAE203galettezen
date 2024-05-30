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
function breadcrumb($elementUID,$movelink){
    $DB_files = loadJson('database/files.json');
    if(isset($DB_files[$elementUID])){
        if($DB_files[$elementUID]['parent_uid'] != "racine"){
            return breadcrumb($DB_files[$elementUID]['parent_uid'],$movelink).'<li class="breadcrumb-item"><a href="?path='.$elementUID.$movelink.'" class="text-decoration-none text-azur">'.$DB_files[$elementUID]['name'].'</a></li>';
        }else{
            return '<li class="breadcrumb-item"><a href="?path='.$elementUID.$movelink.'" class="text-decoration-none text-azur">'.$DB_files[$elementUID]['name'].'</a></li>';
        }
    }
}
// Pour un élement donné, regarde les permissions du parent. Si elles sont de type herited => Fonciton recursive | Sinon retourne le champ permission
function detailHeritedPermissions($elementUID){
    $DB_files = loadJson('database/files.json');
    if($DB_files[$elementUID]['parent_uid'] === "racine"){
        return textTypeShared("public")." par héritage de la racine.";
    }else{
        if($DB_files[$DB_files[$elementUID]['parent_uid']]['share']['type'] == 'herited'){
            return detailHeritedPermissions($DB_files[$elementUID]['parent_uid']);
        }else{
            $parentRestrictif = $DB_files[$DB_files[$elementUID]['parent_uid']];
            return textTypeShared($parentRestrictif['share']['type'])." par héritage de \"<a href='?path=".$parentRestrictif['parent_uid']."&details=".$DB_files[$elementUID]['parent_uid']."'>".$parentRestrictif['name']." <i class='fa-solid fa-arrow-up-right-from-square'></i></a>\"";
        }
    }
}
function formatSize($octets) {
    return number_format($octets / 1024, 0) . 'Ko';
}
function ErrorPermissionsDenied(){
    echo '
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-lg-3 d-none d-lg-block">
            <img src="../errors/saucisse-cocktail-interdit-403.png" alt="Famille de saucisses triste" width="100%">
        </div>
        <div class="col-lg-7">
            <center>
                <h1 class="display-4">Accès interdit</h1>
                <h1 class="display-1 text-danger font-weight-bold">403</h1>
                <p class="lead">Vous ne pouvez pas accéder à cette ressource, désolé.</p>
                <a href="?path=racine" class="btn btn-lg btn-block btn-outline-danger mt-3">Retourner à la racine</a>
            </center>
        </div>
    </div>';
}
function WebExplorer($parentUID){
    $DB_files = loadJson('database/files.json');
    if($_GET['path'] != "racine" && $DB_files[$parentUID]['type'] != "folder"){
        echo '<script>window.location.href = "?path='.$DB_files[$parentUID]['parent_uid'].'";</script>';
    }
    echo '<div id="drop-zone" style="overflow: auto; position: relative;">
    <div id="drag-message" class="d-none d-flex align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100 bg-white opacity-75 text-dark border border-secondary rounded">
        <h3 class="text-center">Déposez votre fichier ici</h3>
    </div>
    <table class="table table-hover"><thead><tr><th>Nom</th><th>Taille</th><th>Propriétaire</th><th>Permissions</th><th></th></tr></thead><tbody>';
    $movelink = "";
    if(isset($_GET['move'])){
        $movelink = "&move=".$_GET['move'];
    }
    if($parentUID != "racine"){
        echo "<tr><td><a class='text-decoration-none' href='?path=".$DB_files[$parentUID]['parent_uid']."$movelink'><i class='fa-solid fa-folder-closed'></i> ..</td><td>-</td><td>-</td><td></td><td></td></tr>";
    }
    foreach ($DB_files as $key => $element) {
        if($element['parent_uid'] === $parentUID && AllowAccessByHeritedPermissions($key,$_SESSION['uid'],$_SESSION['role_uid'])){
            if($element['type'] == 'folder'){
                echo "<tr><td><a class='text-decoration-none text-dark' href='?path=$key$movelink'><i class='fa-solid fa-folder-closed'></i> ".$element['name']."</td><td>-</td><td>".getUserNameByUid($element['owner'])."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
            }elseif($element['type'] == 'file'){
                if(file_exists($_ENV['FILE_REPOSITORY'].$key)){
                    echo "<tr><td><a class='text-decoration-none text-dark' href='file-downloader.php?elementUID=$key'><i class='fa-regular fa-file-lines'></i> ".$element['name']."</a></td><td>".formatSize($element['size'])."</td><td>".getUserNameByUid($element['owner'])."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
                }else{
                    echo "<tr title='Le fichier semble être perdu ...'><td><i class='fa-regular fa-file-lines'></i> <s>".$element['name']."</s></td><td>".formatSize($element['size'])."</td><td>".getUserNameByUid($element['owner'])."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
                }
            }elseif($element['type'] == 'shortcut'){
                echo "<tr><td><a class='text-decoration-none text-dark' href='?path=".$element['link']."'><i class='fa-solid fa-up-right-from-square'></i> ".$element['name']."</a></td><td>-</td><td>".getUserNameByUid($element['owner'])."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
            }
        }
    }
    echo '</tbody></table></div>';
}







// Fonction qui centralise l'interface principal de navigation dans l'explorateur de fichiers.
function FileManagerMain($parentUID) {
    $DB_files = loadJson('database/files.json');
    if(($parentUID !== "racine" && !isset($DB_files[$parentUID])) OR !AllowAccessByHeritedPermissions($parentUID,$_SESSION['uid'],$_SESSION['role_uid'])){ 
        ErrorPermissionsDenied();
        return;
    }
    $movelink = "";
    if(isset($_GET['move'])){
        $movelink = "&move=".$_GET['move'];
        echo $_GET['move'];
        echo "<form method='POST'><div class='alert alert-info'>Vous selectionnez l'élement {$DB_files[$_GET['move']]['name']}. <button type='submit' name='move_file_here' value='{$_GET['move']}' class='btn btn-ciel btn-sm'>Déplacer ici.</button></div></form>";
    } ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?path=racine<?= $movelink ?>" class='text-decoration-none text-azur'>Racine</a></li>
            <?= breadcrumb($_GET['path'],$movelink); ?>
        </ol>
    </nav>
    <?php 
    if(isset($_POST['CreateFolder'])){
        echo CreateFolder($_POST);
    }
    if (isset($_POST['UploadFile'])) {
        UploadFile($_POST,$_FILES);
    }
    WebExplorer($parentUID);
}
?>