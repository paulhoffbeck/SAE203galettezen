<?php
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
        $DB_role[$uid] = array('name' => $name, 'permissions' => "");
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
    $activPermissions = getPermissions($roleUID);
    $json = file_get_contents('database/permissions.json'); 
    if ($json === false) {
        throw new Exception("Impossible de trouver la base de données des permissions.");
    }    
    $DB_permissions = json_decode($json, true);
    if ($DB_permissions === null) {
        throw new Exception("Erreur lors du charger la base de données des permissions.");
    }
    echo "<h4 class='mt-3'>Permissions Administrateur</h4>";
    foreach ($DB_permissions['admin'] as $key => $text) { ?>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="['admin']['<?= $key ?>']">
            <label class="form-check-label" for="flexSwitchCheckDefault"><?= $text ?></label>
        </div>
    <?php }
    echo "<h4 class='mt-3'>Permissions Modérateur</h4>";
    echo "<h4 class='mt-3'>Permissions Générales</h4>";
} ?>