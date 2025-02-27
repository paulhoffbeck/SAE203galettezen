<?php

function valideCodeConfirmation($code) {
    $userTable = json_decode(file_get_contents('database/user.json', true), true);
    if(isset($code) && isset($userTable[$_GET['uid']]) && $code == $userTable[$_GET['uid']]['code_validation']){
        unset($userTable[$_GET['uid']]['code_validation']);
        $file = json_encode($userTable, JSON_PRETTY_PRINT);
        file_put_contents("database/user.json",$file);
        return true;
    }else{
        return false;
    }
}

function register(){
    if(isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["cpassword"])){
        if ($_POST["password"] != $_POST["cpassword"]) {
            return "Les mots de passe ne sont pas identitiques";
        }
        $mail = $_POST["email"];
        $domaine = explode("@",$mail)[1];
        if (isset($_POST['needDomaine']) && $domaine != "galetezen.com") {
            return "Votre adresse email n'est pas autorisée à créer un compte sur notre site.";
        }else{
            $alea = rand(100000,999999);
            $userTable = json_decode(file_get_contents('database/user.json', true), true);
            $uid = uniqid();
            $userTable[$uid] = array(
                "nom"=> $_POST["nom"],
                "prenom"=> $_POST["prenom"],
                "email"=> $_POST["email"],
                "mot_de_passe" => password_hash($_POST["password"], PASSWORD_DEFAULT),
                "role_uid" => "",
                "telephone" => "",
                "poste" => "",
                "code_validation" => $alea,
            );
            $file = json_encode($userTable, JSON_PRETTY_PRINT);
            file_put_contents("database/user.json",$file);
            $url = 'https://tcfa.fr/test-curl.php';
            $data = array(
                'username' => $_POST['prenom'].' '.$_POST['nom'],
                'code_verification' => $alea,
                'uid' => $uid,
                'email' => $_POST["email"]
            );
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            /*
            echo "<script>emailjs.send(\"service_29z78s7\", \"template_kyqv2ik\", {
                username: \"{$_POST['prenom']} {$_POST['nom']}\",
                code_verification: \"$alea\",
                uid: \"$uid\",
                destinataire: \"{$_POST["email"]}\"
            })
            .then(() => {
                alert('Votre mail de confirmation vient de s\'envoyer !');
            }, (err) => {
                console.log('Erreur lors de l\'envoi de l\'email : ' + JSON.stringify(err));
            });</script>";
            */
            return true;
        }
    }
}


function inscriptionFormulaire(){
    $alert = "";
    if(isset($_POST['register'])){
        $result = register();
        if($result === true){
            $alert = "<div class=\"alert alert-success\"><b>Inscription !</b> Vous avez reçu un email de confirmation pour activer votre compte.</div>";
        }else{
            $alert = "<div class=\"alert alert-warning\"><b>Erreur :</b> $result</div>";
        }
    }
    return "
    <br>
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-4 col-md-8 col-12\">
            <div class=\"card\">
                <div class=\"card-body\">
                    $alert
                    <form method=\"POST\" class=\"mt-3\">
                        <div class=\"form-group mt-2\">
                            <label for=\"prenom\">Prénom :</label>
                            <input type=\"text\" class=\"form-control\" id=\"prenom\" name=\"prenom\" required>
                        </div>
                        <div class=\"form-group mt-2\">
                            <label for=\"nom\">Nom :</label>
                            <input type=\"text\" class=\"form-control\" id=\"nom\" name=\"nom\" required>
                        </div>
                        <div class=\"form-group mt-2 mb-2\">
                            <label for=\"email\">Email :</label>
                            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                        </div>
                        <label for=\"input-password\">Mot de passe :</label>
                        <div class=\"input-group mb-3\">
                            <input type=\"password\" class=\"form-control\" id=\"input-password\" name=\"password\" required>
                            <span class=\"input-group-text\" onclick=\"viewinput('input-password')\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></span>
                        </div>
                        <label for=\"input-cpassword\">Confirmation de Mot de passe :</label>
                        <div class=\"input-group\">
                            <input type=\"password\" class=\"form-control\" id=\"input-cpassword\" name=\"cpassword\" required>
                            <span class=\"input-group-text\" onclick=\"viewinput('input-cpassword')\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></span>
                        </div>
                        <small class=\"text-danger d-none\" id=\"diff-mdp\">Les mots de passes doivents être identiques.</small>
                        <div class=\"form-check form-switch mt-3\">
                          <input class=\"form-check-input\" type=\"checkbox\" id=\"flexSwitchCheckChecked\" name=\"needDomaine\" value=\"true\" checked>
                          <label class=\"form-check-label\" for=\"flexSwitchCheckChecked\">[DEMO] Imposer le domaine @galetezen.com</label>
                        </div>
                        <center><button type=\"submit\" name=\"register\" class=\"btn btn-azur mt-3\"><i class=\"fa-solid fa-paper-plane\"></i> S'inscrire</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}
function adminInscriptionFormulaire(){
    $alert = "";
    if(isset($_POST['register'])){
        $result = register();
        if($result === true){
            $alert = "<div class=\"alert alert-success\"><b>Inscription !</b> Un message à été envoyé à l'adresse mail indiquée pour poursuivre l'inscription. Vous pouvez fermer cette page.</div>";
        }else{
            $alert = "<div class=\"alert alert-warning\"><b>Erreur :</b> $result</div>";
        }
    }
    return "
    <br>
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-4 col-md-8 col-12\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"text-center\">
                        <h4>Créer un compte</h4>
                    </div>
                    $alert
                    <form method=\"POST\" class=\"mt-3\">
                        <div class=\"form-group mt-2\">
                            <label for=\"prenom\">Prénom :</label>
                            <input type=\"text\" class=\"form-control\" id=\"prenom\" name=\"prenom\" required>
                        </div>
                        <div class=\"form-group mt-2\">
                            <label for=\"nom\">Nom :</label>
                            <input type=\"text\" class=\"form-control\" id=\"nom\" name=\"nom\" required>
                        </div>
                        <div class=\"form-group mt-2 mb-2\">
                            <label for=\"email\">Email :</label>
                            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                        </div>
                        <label for=\"input-password\">Mot de passe :</label>
                        <div class=\"input-group\">
                            <input type=\"password\" class=\"form-control\" id=\"input-password\" name=\"password\" required>
                            <span class=\"input-group-text\" onclick=\"viewinput('input-password')\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></span>
                        </div>
                        <small class=\"text-danger d-none\" id=\"diff-mdp\">Les mots de passes doivents être identiques.</small>
                        <label for=\"input-cpassword\">Confirmation de Mot de passe :</label>
                        <div class=\"input-group mb-3 mt-3\">
                            <input type=\"password\" class=\"form-control\" id=\"input-cpassword\" name=\"cpassword\" required>
                            <span class=\"input-group-text\" onclick=\"viewinput('input-cpassword')\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></span>
                        </div>
                        <center><button type=\"submit\" name=\"register\" class=\"btn btn-azur mt-3\"><i class=\"fa-solid fa-paper-plane\"></i> Créer le compte</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}
function codeConfirmationFormulaire(){
    $alert = "";
    if(isset($_POST['valideCode'])){
        if(valideCodeConfirmation($_POST['code'])){
            $alert = "<div class=\"alert alert-success\"><b>Bienvenue !</b> Votre compte à été activé, vous receverez un email lorsqu'un responsable validera votre intégration.</div>";
        }else{
            $alert = "<div class=\"alert alert-warning\"><b>Erreur :</b> Le code ne semble pas correct...</div>";
        }
    }
    return "
    <br>
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-4 col-md-8 col-12\">
            <div class=\"card\">
                <div class=\"card-body\">
                    $alert
                    <form method=\"POST\" class=\"mt-3\">
                        <div class=\"form-group mt-2\">
                            <label for=\"prenom\">Code de confirmation :</label>
                            <input type=\"text\" class=\"form-control\" id=\"code\" name=\"code\" required>
                        </div>
                        <center><button type=\"submit\" name=\"valideCode\" class=\"btn btn-azur mt-3\"><i class=\"fa-solid fa-unlock\"></i> Valider</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}