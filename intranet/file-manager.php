<?php require_once("fonctions/main.php"); ?>
<?php
$_SESSION['uid'] = "086bae09778db";






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
function AllowAccessByHeritedPermissions($elementUID,$userUID){
    $DB_files = loadJson('database/files.json');
    if($elementUID === "racine" || $DB_files[$elementUID]['owner'] === $userUID || isset($DB_files[$elementUID]['share']['access']['public']) || isset($DB_files[$elementUID]['share']['access'][$userUID])){
        return true;
    }elseif($DB_files[$elementUID]['share']['type'] === "herited"){
        return AllowAccessByHeritedPermissions($DB_files[$elementUID]['parent_uid'],$userUID);
    }
    return false;
}
function listeTextePermissionsForShared($permissions){
    echo "N/A";
}
function listeTextePermissionsForPublic($permissions){
    $textReturn = "";
    if($permissions['type'] == 'public'){
        $actions = [
            'upload' => 'download',
            'download' => "upload",
            'perms' => "scale-balanced",
            'rename' => "pencil",
            'delet' => "trash-can"
        ];
        foreach ($actions as $action => $icon) {
            $classes = in_array($action, $permissions['access']['public']) ? "text-azur" : "text-pastel";
            $textReturn .= "<i class='fa-solid fa-$icon $classes'></i> ";
        }
    }
    return $textReturn;
}










function FileManagerMain($parentUID) {
    $DB_files = loadJson('database/files.json');
    if($parentUID !== "racine" && !isset($DB_files[$parentUID])){ ?>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <center>
                    <h1 class="display-4">Page non trouvée</h1>
                    <h1 class="display-1 text-danger font-weight-bold">404</h1>
                    <p class="lead">Désolé, nous n'avons pas trouvé la page que vous cherchez ...</p>
                    <a href="?path=racine" class="btn btn-lg btn-block btn-outline-danger mt-3">Retourner à la racine</a>
                </center>
                </div>
                    <div class="col-lg-3 d-none d-lg-block">
                    <img src="../errors/saucisse-cherche.png" alt="Saucisse avec une loupe" width="100%">
                </div>
            </div>
        <?php 
        return;
    }
    if(!AllowAccessByHeritedPermissions($parentUID,$_SESSION['uid'])){ ?>
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
        </div>
    <?php
    return;
    } ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?path=racine" class='text-decoration-none text-azur'>Racine</a></li>
            <?= breadcrumb($_GET['path']); ?>
        </ol>
    </nav>
    <?php 
    if(isset($_POST['CreateFolder'])){
        echo CreateFolder($_POST);
    }
    if (isset($_POST['UploadFile'])) {
        echo UploadFile($_POST,$_FILES);
    }
    echo '<div style="overflow: auto;"><table class="table table-hover"><thead><tr><th>Nom</th><th>Taille</th><th>Propriétaire</th><th>Permissions</th><th></th></tr></thead><tbody>';
    if($parentUID != "racine"){
        echo "<tr><td><a class='text-decoration-none' href='?path=".$DB_files[$parentUID]['parent_uid']."'><i class='fa-solid fa-folder-closed'></i> ..</td><td>-</td><td>-</td><td></td><td></td></tr>";
    }
    foreach ($DB_files as $key => $element) {
        if($element['parent_uid'] === $parentUID && AllowAccessByHeritedPermissions($key,$_SESSION['uid'])){
            if($element['type'] == 'folder'){
                echo "<tr><td><a class='text-decoration-none text-dark' href='?path=$key'><i class='fa-solid fa-folder-closed'></i> ".$element['name']."</td><td>-</td><td>".$element['owner']."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
            }elseif($element['type'] == 'file'){
                if(file_exists("./uploads/$key")){
                    echo "<tr><td><a class='text-decoration-none text-dark' href='file-downloader.php?elementUID=$key'><i class='fa-regular fa-file-lines'></i> ".$element['name']."</a></td><td>".formatSize($element['size'])."</td><td>".$element['owner']."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
                }else{
                    echo "<tr title='Le fichier semble être perdu ...'><td><i class='fa-regular fa-file-lines'></i> <s>".$element['name']."</s></td><td>".formatSize($element['size'])."</td><td>".$element['owner']."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
                }
            }elseif($element['type'] == 'shortcut'){
                echo "<tr><td><a class='text-decoration-none text-dark' href='?path=".$element['link']."'><i class='fa-solid fa-up-right-from-square'></i> ".$element['name']."</a></td><td>-</td><td>".$element['owner']."</td><td>".iconTypeShared($element['share']['type'])."</td><td><a class='text-dark text-decoration-none' href='?path=$parentUID&details=$key'><i class='fa-solid fa-ellipsis-vertical'></i></a></td></tr>";
            }
        }
    }
    echo '</tbody></table></div>';
}
function SelectionContextMenuDetails($elementUID) {
    $DB_files = loadJson('database/files.json');
    if(!isset($DB_files[$elementUID])){
        return;
    }
    $owner = ($DB_files[$elementUID]['owner'] === $_SESSION['uid']) ? "<i><small>(vous)</small></i>" : ""; ?>
    <div class="col-xl-4 col-md-12 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                Informations
                <a href="?path=<?= $_GET['path'] ?>" class="btn btn-sm btn-ciel ml-auto"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <div class="card-body">
                <div id="NameView">
                    <b>Nom : </b><?= $DB_files[$elementUID]['name'] ?> <a onclick="NameEditor()" class="btn btn-sm btn-light"><i class="fa-solid fa-pen-clip"></i></a><br>
                </div>
                <div id="NameEditorForm" class='d-none'>
                    <form method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="NewName" value="<?= $DB_files[$elementUID]['name'] ?>" required maxlength="20">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-pastel" type="submit" name="renameElement" value="<?= $elementUID ?>"><i class="fa-solid fa-floppy-disk"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <b>Type : </b><?= textIconTypeResssource($DB_files[$elementUID]['type']) ?><br>
                <b>Propriétaire : </b><?= $DB_files[$elementUID]['owner'].' '.$owner ?><br>
                <b>Accès : </b><?= textTypeShared($DB_files[$elementUID]['share']['type']) ?> <a class="btn btn-sm btn-pastel" data-bs-toggle="collapse" href="#editPermissions" role="button" aria-expanded="false" aria-controls="editPermissions"><i class="fa-solid fa-pen-to-square"></i></a><br>
                <?php if($DB_files[$elementUID]['share']['type'] === "public"){
                    echo "<b>Détails : </b>".listeTextePermissionsForPublic($DB_files[$elementUID]['share']);
                } ?>
            </div>
        </div>
        <div class="collapse mt-3" id="editPermissions">
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="text-center">
                            <div class="btn-group text-center mt-1" role="group" aria-label="Liste des modes de partage du dossier">
                                <input type="radio" class="btn-check" name="share[type]" value="herited" id="herited" onclick="showTypeSharedElement('heriteFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "herited"){ echo 'checked'; } ?>>
                                <label class="btn btn-sm btn-outline-secondary" for="herited"><i class="fa-regular fa-circle-question"></i> Hériter</label>
                                <input type="radio" class="btn-check" name="share[type]" value="private" id="private" onclick="showTypeSharedElement('privateFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "private"){ echo 'checked'; } ?>>
                                <label class="btn btn-sm btn-outline-danger" for="private"><i class="fa-solid fa-lock"></i> Privé</label>
                                <input type="radio" class="btn-check" name="share[type]" value="shared" id="shared" onclick="showTypeSharedElement('shareFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "shared"){ echo 'checked'; } ?>>
                                <label class="btn btn-sm btn-outline-warning" for="shared"><i class="fa-solid fa-unlock"></i> Partagé</label>
                                <input type="radio" class="btn-check" name="share[type]" value="public" id="public" onclick="showTypeSharedElement('publicFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "public"){ echo 'checked'; } ?>>
                                <label class="btn btn-sm btn-outline-success" for="public"><i class="fa-solid fa-lock-open"></i> Publique</label>
                            </div>
                        </div>
                        <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "herited"){ echo 'show'; } ?>" id="heriteFolder">
                            Hérite des permissions de ses parents.<br>
                            <?= detailHeritedPermissions($elementUID) ?>
                        </div>
                        <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "private"){ echo 'show'; } ?>" id="privateFolder">
                            Privé, seul vous pouvez avoir accès à cette ressource.
                        </div>
                        <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "public"){ echo 'show'; } ?>" id="publicFolder">
                            Tous le monde peut avoir accès à cette ressource par l'arboreceance<span class="text-azur">*</span> ou via le lien de partage: METTRE UN LIEN VERS LA RESSOURCE ICI.<br><b>Permissions que vous accordez :</b><br>
                            <input type="hidden" name="share[access][public][]" value="view" required>
                            <div class="btn-group text-center" role="group" aria-label="Accès du public sur la ressource}">
                                <?php if($DB_files[$elementUID]['type'] == 'folder'){ ?>
                                    <input type="checkbox" class="btn-check" id="upload-perm-public" autocomplete="off" name="share[access][public][]" value="upload">
                                    <label class="btn btn-sm btn-outline-secondary" for="upload-perm-public" title="Téléverser des fichiers depuis son appareil vers la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-download"></i></label>
                                <?php } ?>
                                <input type="checkbox" class="btn-check" id="download-perm-public" autocomplete="off" name="share[access][public][]" value="download">
                                <label class="btn btn-sm btn-outline-secondary" for="download-perm-public" title="Téléverser des fichiers depuis la ressource et les enfants héritiers de celle-ci vers son appareil."><i class="fa-solid fa-upload"></i></label>
                                <input type="checkbox" class="btn-check" id="perms-perm-public" autocomplete="off" name="share[access][public][]" value="perms">
                                <label class="btn btn-sm btn-outline-secondary" for="perms-perm-public" title="Modifier les droits la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-scale-balanced"></i></label>
                                <input type="checkbox" class="btn-check" id="rename-perm-public" autocomplete="off" name="share[access][public][]" value="rename">
                                <label class="btn btn-sm btn-outline-secondary" for="rename-perm-public" title="Renommer la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-pencil"></i></label>
                                <input type="checkbox" class="btn-check" id="delet-perm-public" autocomplete="off" name="share[access][public][]" value="delet">
                                <label class="btn btn-sm btn-outline-secondary" for="delet-perm-public" title="Supprimer la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-trash-can"></i></label>
                            </div><br><br>
                            <small><span class="text-azur">*</span> <i>Pour accéder à une ressource public depuis arboreceance il faut avoir accès à tous les parents de celle-ci (<i class="fa-solid fa-unlock text-warning"></i> <i class="fa-solid fa-lock-open text-success"></i>) ou détenir un raccourcis.</i></small>
                        </div>
                        <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "shared"){ echo 'show'; } ?>" id="shareFolder">
                            <table class="table">
                                <thead><tr><th>Nom</th><th>Action</th></tr></thead>
                                <tbody id="userTableBody">
                                    <tr>
                                        <td>
                                            <select class="form-control form-control-sm" id="userSelect">
                                                <option value="XJ7K4Z">Jean Marc</option>
                                                <option value="T8G2YD">Louise</option>
                                                <option value="WQ1M9L">Pierre</option>
                                                <option value="P5RV2H">Marie</option>
                                            </select>
                                        </td>
                                        <td><span class="btn btn-sm btn-ciel" id="addButton">+</span></td>
                                    </tr>
                                    <!-- Les lignes ajoutées dynamiquement iront ici -->
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" name="savePermissions" value="<?= $_GET['details'] ?>" class="btn btn-outline-indigo btn-sm"><i class="fa-solid fa-floppy-disk"></i> Appliquer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Explorateur de Fichiers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-pastel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-md-12 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Favoris
                        <button type="button" class="btn btn-sm btn-ciel ml-auto"><i class="fa-solid fa-heart-circle-plus"></i></button>
                    </div>
                    <div class="card-body">
                        <table class="table">

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-12 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Explorateur en ligne
                        <div class="btn-group ml-auto" role="group" aria-label="Barre d'outil de l'explorateur">
                            <button type="button" class="btn btn-sm btn-ciel" data-bs-toggle="modal" data-bs-target="#ModalNewFolder"><i class="fa-solid fa-folder-plus"></i> Dossier</button>
                            <button type="button" class="btn btn-sm btn-ciel" data-bs-toggle="modal" data-bs-target="#ModalUploadFile"><i class="fa-solid fa-file-circle-plus"></i> Fichier</button>
                        </div>

<!-- Modal New Folder -->
<div class="modal fade" id="ModalNewFolder" tabindex="-1" aria-labelledby="ModalNewFolderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalNewFolderLabel">Créer un dossier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <label for="FolderNamer">Nom du dossier</label>
                    <input type="text" id="FolderNamer" class="form-control" name="name" required maxlength="20">
                    <input type="hidden" name="parent_uid" value="<?= $_GET['path'] ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="CreateFolder" class="btn btn-turquoise">Créer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Upload File -->
<div class="modal fade" id="ModalUploadFile" tabindex="-1" aria-labelledby="ModalUploadFileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalUploadFileLabel">Télécharger un fichier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="FileUploader">Choisir un fichier</label>
                    <input type="file" id="FileUploader" class="form-control" name="file" required>
                    <input type="hidden" name="parent_uid" value="<?= $_GET['path'] ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="UploadFile" class="btn btn-turquoise">Télécharger</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
                    </div>
                    <div class="card-body">
                        <?php FileManagerMain($_GET['path']) ?>
                    </div>
                </div>
            </div>
            <?php if(isset($_GET['details'])){
                SelectionContextMenuDetails($_GET['details']);
            } ?>
        </div>
    </div>
    
    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            const userSelect = document.getElementById('userSelect');
            const selectedOption = userSelect.options[userSelect.selectedIndex];
            if (selectedOption.disabled) return;
            const selectedValue = selectedOption.value;
            const selectedText = selectedOption.text;
            const tableBody = document.getElementById('userTableBody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${selectedText}</td>
                <td>
                    <div class="btn-group text-center" role="group" aria-label="Accès de ${selectedText}">
                        <input type="checkbox" class="btn-check" id="upload-perm-${selectedValue}" autocomplete="off" name="user[${selectedValue}][]" value="upload">
                        <label class="btn btn-sm btn-outline-secondary" for="upload-perm-${selectedValue}" title="Téléverser des fichiers depuis son appareil vers la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-download"></i></label>
                        <input type="checkbox" class="btn-check" id="download-perm-${selectedValue}" autocomplete="off" name="user[${selectedValue}][]" value="download">
                        <label class="btn btn-sm btn-outline-secondary" for="download-perm-${selectedValue}" title="Téléverser des fichiers depuis la ressource et les enfants héritiers de celle-ci vers son appareil."><i class="fa-solid fa-upload"></i></label>
                        <input type="checkbox" class="btn-check" id="perms-perm-${selectedValue}" autocomplete="off" name="user[${selectedValue}][]" value="perms">
                        <label class="btn btn-sm btn-outline-secondary" for="perms-perm-${selectedValue}" title="Modifier les droits la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-scale-balanced"></i></label>
                        <input type="checkbox" class="btn-check" id="rename-perm-${selectedValue}" autocomplete="off" name="user[${selectedValue}][]" value="rename">
                        <label class="btn btn-sm btn-outline-secondary" for="rename-perm-${selectedValue}" title="Renommer la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-pencil"></i></label>
                        <input type="checkbox" class="btn-check" id="delet-perm-${selectedValue}" autocomplete="off" name="user[${selectedValue}][]" value="delet">
                        <label class="btn btn-sm btn-outline-secondary" for="delet-perm-${selectedValue}" title="Supprimer la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-trash-can"></i></label>
                    </div>
                    <button class="btn btn-outline-danger btn-sm removeButton" data-value="${selectedValue}" data-text="${selectedText}">x</button>
                </td>
            `;
            tableBody.appendChild(newRow);
            selectedOption.disabled = true;
            newRow.querySelector('.removeButton').addEventListener('click', function() {
                selectedOption.disabled = false;
                tableBody.removeChild(newRow);
            });
        });
    </script>
    <script>
        function showTypeSharedElement($typeID) {
            const folderIds = ['heriteFolder', 'privateFolder', 'shareFolder', 'publicFolder'];
            folderIds.forEach(id => {
                const folder = document.getElementById(id);
                if (id === $typeID) {
                    folder.classList.add('show');
                } else {
                    folder.classList.remove('show');
                }
            });
        }
        function NameEditor() {
            document.getElementById('NameView').classList.add('d-none');
            document.getElementById('NameEditorForm').classList.remove('d-none');
        }
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
