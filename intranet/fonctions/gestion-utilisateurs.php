<?php
function demandeValidationUserNumber(){
    $data = json_decode(file_get_contents('./database/user.json'), true);
    $count = 0;
    foreach($data as $uid => $user){
        if(!isset($user['role_uid']) || empty($user['role_uid'])){
            $count += 1;
        }
    }
    return $count;
}
function userEnAttenteValidation(){
    $data = json_decode(file_get_contents('./database/user.json'), true);
    $interface = "<ol class=\"list-group\">";
    foreach($data as $uid => $user){
        if(!isset($user['role_uid']) || empty($user['role_uid'])){
            $interface .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">
                <div class=\"ms-2 me-auto\">
                    <div class=\"fw-bold\">{$user['prenom']} {$user['nom']}</div>
                    <small></small>
                </div>
                <a href=\"?uid=$uid\" class=\"btn btn-outline-azur btn-sm rounded-pill\"><i class=\"fa-solid fa-unlock\"></i> Traiter</a>
            </li>";
        }
    }
    $interface .= "</ol>";
    return $interface;
}
function activeUser(){
    $data = json_decode(file_get_contents('./database/user.json'), true);
    $interface = "<ol class=\"list-group\">";
    foreach($data as $uid => $user){
        if(!empty($user['role_uid'])){
            $interface .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">
                <div class=\"ms-2 me-auto\">
                    <div class=\"fw-bold\">{$user['prenom']} {$user['nom']}</div>
                    <small class=\"badge bg-light-subtle border border-light-subtle text-light-emphasis rounded-pill\">".getRoleName($user['role_uid'])."</small><br>
                    <small class=\"badge bg-light-subtle border border-light-subtle text-light-emphasis rounded-pill\">{$user['poste']}</small>
                </div>
                <a href=\"?uid=$uid\" class=\"btn btn-outline-azur btn-sm rounded-pill\"><i class=\"fa-solid fa-people-roof\"></i> Gérer</a>
            </li>";
        }
    }
    $interface .= "</ol>";
    return $interface;
}
function traitementUserValidation($uid){
    $data = json_decode(file_get_contents('./database/user.json'), true);
    $roles = json_decode(file_get_contents('./database/role.json'), true);
    $selecteur = "<select name=\"role_uid\" class=\"form-control mb-4\" required>";
    foreach ($roles as $key => $role){
        if($key == $data[$uid]['role_uid']){
            $selecteur .= "<option value=\"$key\" selected>{$role['name']}</option>";
        }else{
            $selecteur .= "<option value=\"$key\">{$role['name']}</option>";
        }
    }
    $selecteur .= "</select>";
    if(file_exists('./img/collaborateur/'. $uid .'.png')){
        $image = "./img/collaborateur/$uid.png";
    }else{
        $image = "./img/collaborateur/pasdepp.png";
    }
    $interface = "
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                Traitement de l'intégration de {$data[$uid]['prenom']} {$data[$uid]['nom']}
            </div>
            <div class=\"card-body\">
                ".valideUser()."
                <form method=\"post\" class=\"mt-3\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <div class=\"row\">
                                <div class=\"col-lg-auto\">
                                    <center>
                                        <img src=\"$image\" class=\"rounded\" width=\"128px\">
                                    </center>
                                </div>
                                <div class=\"col-lg-auto\">
                                    <h4>{$data[$uid]['prenom']} {$data[$uid]['nom']}</h4>
                                    <b>Email : </b>{$data[$uid]['email']}<br>
                                    <b>Téléphone : </b>{$data[$uid]['telephone']}<br>
                                    Occupe le poste de {$data[$uid]['poste']}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type=\"hidden\" name=\"uid\" value=\"$uid\" />
                    <label>Prénom :</label>
                    <input type=\"text\" class=\"form-control mb-3\" name=\"prenom\" value=\"{$data[$uid]['prenom']}\" required>
                    <label>Nom :</label>
                    <input type=\"text\" class=\"form-control mb-3\" name=\"nom\" value=\"{$data[$uid]['nom']}\" required>
                    <label>Numério de téléphone :</label>
                    <input type=\"text\" class=\"form-control mb-3\" name=\"telephone\" placeholder=\"Au format 00-00-00-00-00\" value=\"{$data[$uid]['telephone']}\" required>
                    <label>Description du poste :</label>
                    <input type=\"text\" class=\"form-control mb-3\" name=\"poste\" placeholder=\"Exemple : Responsable de Production\" maxlength=\"40\" value=\"{$data[$uid]['poste']}\" required>
                    <label>Attribution du rôle :</label>
                    $selecteur
                    <center>
                        <button type=\"submit\" name=\"valideUser\" class=\"btn btn-azur mb-2\"><i class=\"fa-solid fa-user-check\"></i> Valider</button>
                    </center>
                </form>
            </div>
        </div>
    </div>";
    return $interface;
}

function valideUser(){
    if(isset($_POST['valideUser'])){
        if(isset($_GET['uid']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['telephone']) && isset($_POST['poste']) && isset($_POST['role_uid'])){
            $data = json_decode(file_get_contents('./database/user.json'), true);
            $uid = $_GET['uid'];
            $modifications = "";
            if($data[$uid]['prenom'] != $_POST['prenom']){
                $modifications .= "votre prénom était {$data[$uid]['prenom']} est à été modifié en {$_POST['prenom']}, ";
                $data[$uid]['prenom'] = $_POST['prenom'];
            }
            if($data[$uid]['nom'] != $_POST['nom']){
                $modifications .= "votre nom était {$data[$uid]['nom']} est à été modifié en {$_POST['nom']}, ";
                $data[$uid]['nom'] = $_POST['nom'];
            }
            if($data[$uid]['telephone'] != $_POST['telephone']){
                $modifications .= "votre numéro de téléphone était \"{$data[$uid]['telephone']}\" est à été modifié en {$_POST['telephone']}, ";
                $data[$uid]['telephone'] = $_POST['telephone'];
            }
            if($data[$uid]['poste'] != $_POST['poste']){
                $modifications .= "votre affetation de poste était \"{$data[$uid]['poste']}\" est à été modifié en {$_POST['poste']}, ";
                $data[$uid]['poste'] = $_POST['poste'];
            }
            $data[$uid]['role_uid'] = $_POST['role_uid'];
            $modifications = substr_replace($modifications, ".", -2);
            echo "<div class=\"d-none\" id=\"modifications\">$modifications</div>";
            file_put_contents("./database/user.json",json_encode($data, JSON_PRETTY_PRINT)); ?>
            <script>
                function sendMailEvolutionCompte(){
                    modifications = document.getElementById('modifications').innerHTML;
                    console.log(modifications);
                    emailjs.send("default_service", "template_g16em3d", {
                        username: "<?= $_POST['prenom'].' '.$_POST['nom'] ?>",
                        modifieur: '<?= $_SESSION['prenom'].' '.$_SESSION['nom'] ?>',
                        modifications: modifications,
                        destinataire: "<?= $data[$uid]['email'] ?>"
                    })
                    .then(() => {
                        alert('Email envoyé avec succès!');
                    }, (err) => {
                        alert('Erreur lors de l\'envoi de l\'email : ' + JSON.stringify(err));
                    });
                }
            </script>
            <?php
            insertActivity($_SESSION['uid'],"Modification des informations de {$_POST['prenom']} {$_POST['nom']}.");
            return "<div class=\"alert alert-success\" role=\"alert\"><b>Validé !</b> Le compte est maintenant autorisé à ce connecter. Cliquez <u onclick=\"sendMailEvolutionCompte()\">ICI</u> pour envoyer un email d'information, cliquez <a href=\"?uid={$_GET['uid']}\">ici</a> pour actualiser.</div>";
        }else{
            return "<div class=\"alert alert-warning\" role=\"alert\"><b>Erreur :</b> des données sont manquantes.</div>";
        }
    }
}
?>