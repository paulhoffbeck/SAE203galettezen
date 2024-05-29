<?php require_once("fonctions/main.php"); alreadylogin(); ?>
<?php
$_SESSION['uid'] = "def456";






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
                <?php if(FindPermissions($elementUID,$_SESSION['uid'],"rename")){ ?>
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
                <?php }else{ ?>
                    <b>Nom : </b><?= $DB_files[$elementUID]['name'] ?><br>
                <?php } ?>
                <b>Type : </b><?= textIconTypeResssource($DB_files[$elementUID]['type']) ?><br>
                <b>Propriétaire : </b><?= getUserNameByUid($DB_files[$elementUID]['owner']).' '.$owner ?><br>
                <b>Accès : </b><?= textTypeShared($DB_files[$elementUID]['share']['type']) ?>
                <?php if(FindPermissions($elementUID,$_SESSION['uid'],"perms")){
                    echo '<a class="btn btn-sm btn-pastel" data-bs-toggle="collapse" href="#editPermissions" role="button" aria-expanded="false" aria-controls="editPermissions"><i class="fa-solid fa-pen-to-square"></i></a>';
                }
                if($DB_files[$elementUID]['share']['type'] === "public"){
                    echo "<br><b>Détails : </b>".listeTextePermissionsForPublic($DB_files[$elementUID]['share']);
                } ?>
            </div>
            <form method="POST" class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" name="create_shortcut" value="<?= $elementUID ?>" class="btn btn-sm btn-ciel"><i class="fa-solid fa-link"></i> Raccourcis</button>
                <a href="?path=<?= $DB_files[$elementUID]['parent_uid'] ?>&move=<?= $elementUID ?>" class="btn btn-sm btn-ciel"><i class="fa-solid fa-up-down-left-right"></i> Déplacer</a>
                <button type="button" class="btn btn-sm btn-outline-indigo"><i class="fa-regular fa-trash-can"></i> Supprimer</button>
            </form>
        </div>
        <?php if(FindPermissions($elementUID,$_SESSION['uid'],"perms")){ ?>
            <div class="collapse mt-3" id="editPermissions">
                <div class="card">
                    <div class="card-body">
                            <div class="text-center">
                                <div class="btn-group text-center mt-1" role="group" aria-label="Liste des modes de partage du dossier">
                                    <input type="radio" class="btn-check" name="typeSelecteur" id="herited" onclick="showTypeSharedElement('heriteFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "herited"){ echo 'checked'; } ?>>
                                    <label class="btn btn-sm btn-outline-secondary" for="herited"><i class="fa-regular fa-circle-question"></i> Hériter</label>
                                    <input type="radio" class="btn-check" name="typeSelecteur" id="private" onclick="showTypeSharedElement('privateFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "private"){ echo 'checked'; } ?>>
                                    <label class="btn btn-sm btn-outline-danger" for="private"><i class="fa-solid fa-lock"></i> Privé</label>
                                    <input type="radio" class="btn-check" name="typeSelecteur" id="shared" onclick="showTypeSharedElement('shareFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "shared"){ echo 'checked'; } ?>>
                                    <label class="btn btn-sm btn-outline-warning" for="shared"><i class="fa-solid fa-unlock"></i> Partagé</label>
                                    <input type="radio" class="btn-check" name="typeSelecteur" id="public" onclick="showTypeSharedElement('publicFolder')" autocomplete="off" <?php if($DB_files[$elementUID]['share']['type'] === "public"){ echo 'checked'; } ?>>
                                    <label class="btn btn-sm btn-outline-success" for="public"><i class="fa-solid fa-lock-open"></i> Publique</label>
                                </div>
                            </div>
                            <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "herited"){ echo 'show'; } ?>" id="heriteFolder">
                                <form method="post">
                                    Hérite des permissions de ses parents.<br>
                                    <?= detailHeritedPermissions($elementUID) ?>
                                    <input type="hidden" name="share[type]" value="herited">
                                    <div class="text-center mt-3">
                                        <button type="submit" name="savePermissions" value="<?= $_GET['details'] ?>" class="btn btn-outline-indigo btn-sm"><i class="fa-solid fa-floppy-disk"></i> Appliquer</button>
                                    </div>
                                </form>
                            </div>
                            <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "private"){ echo 'show'; } ?>" id="privateFolder">
                                <form method="post">
                                    Privé, seul vous pouvez avoir accès à cette ressource.
                                    <input type="hidden" name="share[type]" value="private">
                                    <div class="text-center mt-3">
                                        <button type="submit" name="savePermissions" value="<?= $_GET['details'] ?>" class="btn btn-outline-indigo btn-sm"><i class="fa-solid fa-floppy-disk"></i> Appliquer</button>
                                    </div>
                                </form>
                            </div>
                            <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "public"){ echo 'show'; } ?>" id="publicFolder">
                                <form method="post">
                                    Tous le monde peut avoir accès à cette ressource par l'arboreceance<span class="text-azur">*</span> ou via le lien de partage: METTRE UN LIEN VERS LA RESSOURCE ICI.<br><b>Permissions que vous accordez :</b><br>
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
                                    <input type="hidden" name="share[type]" value="public">
                                    <input type="hidden" name="share[access][public][]" value="view" required>
                                    <div class="text-center mt-3">
                                        <button type="submit" name="savePermissions" value="<?= $_GET['details'] ?>" class="btn btn-outline-indigo btn-sm"><i class="fa-solid fa-floppy-disk"></i> Appliquer</button>
                                    </div>
                                </form>
                            </div>
                            <div class="collapse mt-3 <?php if($DB_files[$elementUID]['share']['type'] === "shared"){ echo 'show'; } ?>" id="shareFolder">
                                <form method="post">
                                    <table class="table">
                                        <thead><tr><th>Nom</th><th>Action</th></tr></thead>
                                        <tbody id="userTableBody">
                                            <tr>
                                                <td>
                                                    <select class="form-control form-control-sm" id="userSelect">
                                                        <optgroup label="Utilisateurs">
                                                            <?php Aff_Users_Options() ?>
                                                        </optgroup>
                                                        <optgroup label="Groupes" disabled>
                                                            <?php Aff_Roles_Options() ?>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td><span class="btn btn-sm btn-ciel" id="addButton">+</span></td>
                                            </tr>
                                            <!-- Les lignes ajoutées dynamiquement iront ici -->
                                        </tbody>
                                    </table>
                                    <small><span class="text-azur">*</span> <i>Pour accéder à une ressource partagée depuis arboreceance il faut avoir accès à tous les parents de celle-ci (<i class="fa-solid fa-unlock text-warning"></i> <i class="fa-solid fa-lock-open text-success"></i>) ou détenir un raccourcis.</i></small>
                                    <input type="hidden" name="share[type]" value="shared">
                                    <div class="text-center mt-3">
                                        <button type="submit" name="savePermissions" value="<?= $_GET['details'] ?>" class="btn btn-outline-indigo btn-sm"><i class="fa-solid fa-floppy-disk"></i> Appliquer</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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
    <?php head(); navbar() ?>
    <div class="container-fluid mb-3">
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
            <form id="uploadForm" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="FileUploader">Choisir un fichier</label>
                    <input type="file" id="FileUploader" class="form-control" name="file[]" multiple webkitdirectory directory required>
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
                        <input type="checkbox" class="btn-check" id="upload-perm-${selectedValue}" autocomplete="off" name="share[access][${selectedValue}][]" value="upload">
                        <label class="btn btn-sm btn-outline-secondary" for="upload-perm-${selectedValue}" title="Téléverser des fichiers depuis son appareil vers la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-download"></i></label>
                        <input type="checkbox" class="btn-check" id="download-perm-${selectedValue}" autocomplete="off" name="share[access][${selectedValue}][]" value="download">
                        <label class="btn btn-sm btn-outline-secondary" for="download-perm-${selectedValue}" title="Téléverser des fichiers depuis la ressource et les enfants héritiers de celle-ci vers son appareil."><i class="fa-solid fa-upload"></i></label>
                        <input type="checkbox" class="btn-check" id="perms-perm-${selectedValue}" autocomplete="off" name="share[access][${selectedValue}][]" value="perms">
                        <label class="btn btn-sm btn-outline-secondary" for="perms-perm-${selectedValue}" title="Modifier les droits la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-scale-balanced"></i></label>
                        <input type="checkbox" class="btn-check" id="rename-perm-${selectedValue}" autocomplete="off" name="share[access][${selectedValue}][]" value="rename">
                        <label class="btn btn-sm btn-outline-secondary" for="rename-perm-${selectedValue}" title="Renommer la ressource et les enfants héritiers de celle-ci."><i class="fa-solid fa-pencil"></i></label>
                        <input type="checkbox" class="btn-check" id="delet-perm-${selectedValue}" autocomplete="off" name="share[access][${selectedValue}][]" value="delet">
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
    </script>
    <script>
        function NameEditor() {
            document.getElementById('NameView').classList.add('d-none');
            document.getElementById('NameEditorForm').classList.remove('d-none');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropZone = document.getElementById('drop-zone');
            var dragMessage = document.getElementById('drag-message');
            var fileInput = document.getElementById('FileUploader');
            var form = document.getElementById('uploadForm');
            var dragCounter = 0;

            dropZone.addEventListener('dragenter', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dragCounter++;
                dragMessage.classList.remove('d-none');
            });

            dropZone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dragCounter--;
                if (dragCounter === 0) {
                    dragMessage.classList.add('d-none');
                }
            });

            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });

            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dragMessage.classList.add('d-none');
                dragCounter = 0;

                var files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    $('#ModalUploadFile').modal('show');
                }
            });

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    $('#ModalUploadFile').modal('show');
                }
            });
        });
    </script>
    <?php footer(); ?>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</body>
</html>
