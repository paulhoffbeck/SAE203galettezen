<?php
function loadRoleListe(){
    try {
        $json = file_get_contents('database/role.json'); 
        if ($json === false) {
            throw new Exception("Impossible de trouver la base de données des rôles.");
        }
        $DB_role = json_decode($json, true);
        if ($DB_role === null) {
            throw new Exception("Erreur lors du charger la base de données des rôles.");
        }
        foreach ($DB_role as $uid => $role){
            if(isset($_GET['uid']) && $_GET['uid'] === $uid){
                echo "<tr><td>{$role['name']}</td><td><a href='role.php?uid=".$uid."' class='btn btn-sm btn-outline-ciel'>Détails</a></td></tr>";
            }else{
                echo "<tr><td>{$role['name']}</td><td><a href='role.php?uid=".$uid."' class='btn btn-sm btn-azur'>Détails</a></td></tr>";
            }
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
    }
}
function createRole($name){
    try {
        $json = file_get_contents('database/role.json'); 
        if ($json === false) {
            throw new Exception("Impossible de trouver la base de données des rôles.");
        }
        $DB_role = json_decode($json, true);
        if ($DB_role === null) {
            throw new Exception("Erreur lors du charger la base de données des rôles.");
        }
        $uid = uniqid();
        $DB_role[$uid] = array('name' => $name, 'permissions' => array("admin" => array(), "modo" => array(), "general" => array()));
        $newJson = json_encode($DB_role, JSON_PRETTY_PRINT);
        if ($newJson === false) {
            throw new Exception("Erreur lors de la génération du nouveau rôle.");
        }
        $result = file_put_contents('database/role.json', $newJson);
        if ($result === false) {
            throw new Exception("Impossible de sauvegarder les modifications dans la base de données.");
        }
        echo "<div class='alert alert-success'>Vous avez ajouté le rôle $name à la base de données.</div>";
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
    }
}
function getRoleName($roleUID) {
    try {
        $json = file_get_contents('database/role.json'); 
        if ($json === false) {
            throw new Exception("Impossible de trouver la base de données des rôles.");
        }    
        $DB_role = json_decode($json, true);
        if ($DB_role === null) {
            throw new Exception("Erreur lors du charger la base de données des rôles.");
        }
        return $DB_role[$roleUID]['name'];
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
    }
}
function getPermissions($roleUID) {
    try {
        $json = file_get_contents('database/role.json'); 
        if ($json === false) {
            throw new Exception("Impossible de trouver la base de données des rôles.");
        }    
        $DB_role = json_decode($json, true);
        if ($DB_role === null) {
            throw new Exception("Erreur lors du charger la base de données des rôles.");
        }
        return $DB_role[$roleUID]['permissions'];
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
    }
}
function permissionEditor($roleUID){
    function updatePermissions($roleUID,$NewPermissions) {
        try {
            $json = file_get_contents('database/role.json');
            if ($json === false) {
                throw new Exception("Impossible de trouver la base de données des rôles.");
            }
            $DB_role = json_decode($json, true);
            if ($DB_role === null) {
                throw new Exception("Erreur lors du charger la base de données des rôles.");
            }
            $DB_role[$roleUID]['permissions']['admin'] = $NewPermissions['admin'] ?? []; // opérateur de coalescence nulle
            $DB_role[$roleUID]['permissions']['modo'] = $NewPermissions['modo'] ?? [];
            $DB_role[$roleUID]['permissions']['general'] = $NewPermissions['general'] ?? [];
            $newJson = json_encode($DB_role, JSON_PRETTY_PRINT);
            if ($newJson === false) {
                throw new Exception("Erreur lors de la structuration des permissions du groupe.");
            }
            $result = file_put_contents('database/role.json', $newJson);
            if ($result === false) {
                throw new Exception("Impossible de sauvegarder les modifications dans la base de données.");
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
        }
    }
    try {
        if(isset($_POST['updatePermissions'])){
            updatePermissions($roleUID,$_POST);
        }
        $activPermissions = getPermissions($roleUID);
        $json = file_get_contents('database/permissions.json'); 
        if ($json === false) {
            throw new Exception("Impossible de trouver la base de données des permissions.");
        }
        $DB_permissions = json_decode($json, true);
        if ($DB_permissions === null) {
            throw new Exception("Erreur lors du charger la base de données des permissions.");
        }
        echo "<form method='post'>";
        foreach (array("admin"=>"Administrateur", "modo"=>"Modérateur", "general"=>"Générales") as $categorie => $name){
            echo "<h4 class='mt-3'>Permissions $name</h4>";
            foreach ($DB_permissions[$categorie] as $key => $text) {
                $inputState = "";
                if(isset($activPermissions[$categorie][$key])){
                    $inputState = "checked";
                } ?>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="<?= $categorie ?>[<?= $key ?>]" value="true" <?= $inputState ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault"><?= $text ?></label>
                </div>
            <?php }
        }
        echo "<div class='text-center mt-5'><button type='submit' name='updatePermissions' class='btn btn-azur'>Sauvegarder</button></div></form>";
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
    }
}
function getMembreRoleListe($roleUID){
    try {
        $json = file_get_contents('database/user.json'); 
        if ($json === false) {
            throw new Exception("Impossible de trouver la base de données des utilisateurs.");
        }
        $DB_users = json_decode($json, true);
        if ($DB_users === null) {
            throw new Exception("Erreur lors du charger la base de données des utilisateurs.");
        }
        echo "<table class='table text-center'>";
        echo "<thead><tr><th>Prénom Nom</th><th>Profil</th></tr></thead><tbody>";
        foreach($DB_users as $key => $data) {
            if($data['role_uid'] === $roleUID){
                echo "<tr><td>".$data['prenom']." ".$data['nom']."</td><td><a class='btn btn-indigo btn-sm' href=''>?</button></td><tr>";
            }
        }
        echo "</tbody></table>";
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
    }
}
function loadSessionPermissions($roleUID) {
    try {
        $json = file_get_contents('database/role.json'); 
        if ($json === false) {
            throw new Exception("Impossible de trouver la base de données des rôles.");
        }    
        $DB_role = json_decode($json, true);
        $_SESSION['role_name'] = $DB_role[$roleUID]['name'];
        $_SESSION['role_permissions'] = $DB_role[$roleUID]['permissions'];
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><b>Erreur :</b> ' . $e->getMessage().'</div>';
    }
}
function hasPermission($categorie,$permission,$returnIndex){
    if(isset($_SESSION['role_permissions'][$categorie][$permission]) && $_SESSION['role_permissions'][$categorie][$permission] === "true"){
        return true;
    }else{
        if($returnIndex){
            header("Location: index.php");
        }else{
            return false;
        }
    }
} 

function alreadylogin(){
if(!isset($_SESSION["uid"]) || !isset($_SESSION["prenom"]) || !isset($_SESSION["nom"])){
    header('Location: connexion.php');
    exit;
  }
}
?>    