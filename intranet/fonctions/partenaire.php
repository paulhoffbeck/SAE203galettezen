<?php
function partenaires($tab){
    ?>
    <script>
    //Fonction JS pour agrandir la photo de profil dans le tableau
    function bigImg(x) {
        x.style.height = "100px";
        x.style.width = "100px";
        }
    function normalImg(x) {
        x.style.height = "28px";
        x.style.width = "28px";
        }
    </script>

    <?php


    // Création du tableau

    echo '<div class="container mb-5">
    <h1 class="my-4">Liste de nos Partenaires</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <form method="POST">
                    <th class="bg-turquoise border-turquoise">Rechercher un nom</th>
                    <th class="bg-turquoise border-turquoise"><input class="bg-turquoise border-0" type="text" name="nom" placeholder="Chercher par Nom"></th>
                    <th class="bg-turquoise border-turquoise"><button type="submit" name="rechercher" class="btn btn-pastel">Appliquer</button></th>
                </form>
            </tr>

        </thead>
    </table>


    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="sticky-top">
            <th>logo</th>
            <th>Nom</th>
            <th>fournisseur</th>
            <th>montrer</th>
            <th>image</th>
            <th>lien</th>
            <th>description</th>
            <th>modifier</th>
        </tr>
    </thead>
    
    <tbody>';
    
    foreach ($tab as $key => $value) {

        //echo("
        //      <tr>
        //      <td><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\" src=\"./img/parter/".$value["image"]."\" width=\"28px\"></td>
        //      <td>".$value["nom"]."</td>
        //      <td>".$value["email"]."</td>
        //      <td>".$value["image"]."</td>
        //      <td>".$value["lien"]."</td>
        //      <td>".$value["description"]."</td>
        //     </tr>
        // ");
        echo("<tr><form method='POST'enctype=\"multipart/form-data\">");

        echo("<td><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\" src=\"./img/parter/".$value["image"]."\" width=\"28px\"></td>");
        echo("<td> <input name='newnom' class='form-control' value='".$value["nom"]."'></td>");
        if($value["fournisseur"]=="oui"){$fourn='checked';}else{$fourn='';} 
        echo("<td> <input type='checkbox' name='newfour' ".$fourn."><label for 'newfour'>fournisseur</p></td>");
        
        if($value["montrer"]=="oui"){$montre='checked';}else{$montre='';} 
        echo("<td> <input type='checkbox' name='newmontrer' ".$montre."><label for 'newmontrer'>montrer </p></td>");
        echo("<td> <input type=\"file\" name=\"image\" class=\"form-control\" accept=\"image/*\"></td>");
        echo("<td> <input name='newlien' class='form-control' value='".$value["lien"]."'></td>");
        echo("<td> <textarea name='newdesc' class='form-control' >".$value["description"]."</textarea></td>");

        echo("<td>  
                
        <button type=\"submit\" class=\"btn btn-primary\">modifer</button>
        <input type=\"hidden\" name=\"cle\" value=".$key.">
        </td> 
        </form>");
    }
    echo'</tbody></table></div>';

}

function affiche(){
    if (isset($_POST["nom"])){
        $donnee = recherche($_POST["nom"]);
    }else{
        $json = file_get_contents('database/partenaire.json');
        $donnee = json_decode($json, true);
    }
    return $donnee;
}


function modifier(){
    if(isset($_POST["cle"])){

        $json = file_get_contents('./database/partenaire.json');
        $donnee = json_decode($json, true);
        $donnee[$_POST["cle"]]["nom"]=$_POST["newnom"];
        if(isset($_POST["newfour"])){
            $donnee[$_POST["cle"]]["fournisseur"]="oui";}
        else{
            $donnee[$_POST["cle"]]["fournisseur"]="non";
            }
        if(isset($_POST["newmontrer"])){
            $donnee[$_POST["cle"]]["montrer"]="oui";}
        else{
            $donnee[$_POST["cle"]]["montrer"]="non";
        }
        $donnee[$_POST["cle"]]["image"]=$_POST["cle"].".png";
        $donnee[$_POST["cle"]]["lien"]=$_POST["newlien"];
        $donnee[$_POST["cle"]]["description"]=$_POST["newdesc"];

        $file = json_encode($donnee,JSON_PRETTY_PRINT);
    file_put_contents("./database/partenaire.json",$file);
    }
}

function recherche($txt){
    $json = file_get_contents('./database/partenaire.json');
    $donnee = json_decode($json, true);
    $text = strtoupper($txt);
    $tab = array();

    foreach($donnee as $key => $value){
        $lenval = strlen($value["nom"]);
        $lenrech = strlen($text);

        if($lenval>$lenrech){
            for ($i=0; $i < $lenval-$lenrech+1; $i++) { 
                $ech = strtoupper(substr($value["nom"],$i,$lenrech)); 
                if($ech == $text){
                    array_push($tab,$value);
                    break;
                }
            }
        }
    } 
    return $tab;
}

function changeImagePart(){
    if(isset($_FILES["image"])){if($_FILES["image"]["error"] == 0) {
        $allowed = ["jpg" => "image/jpeg", "jpeg" => "image/jpeg", "png" => "image/png", "gif" => "image/gif"];
        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){
            die("Erreur : Format de fichier non autorisé.");
        }
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize){
            die("Erreur : La taille du fichier dépasse la limite autorisée.");
        }
        if(in_array($filetype, $allowed)){
            $uid = $_POST["cle"];
            $target_dir = "./img/parter/";
            $target_file = $target_dir . $uid . ".png";
            switch ($filetype) {
                case "image/jpeg":
                    $image = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
                    break;
                case "image/gif":
                    $image = imagecreatefromgif($_FILES["image"]["tmp_name"]);
                    break;
                case "image/png":
                    $image = imagecreatefrompng($_FILES["image"]["tmp_name"]);
                    break;
                default:
                    die("Erreur : Format de fichier non supporté.");
            }
            if(imagepng($image, $target_file)){
                imagedestroy($image);
                echo "<div class=\"alert alert-success mt-2 mb-2\">La photo a été téléchargée et convertie avec succès.</div>";
            }else{
                echo "<div class=\"alert alert-warning mt-2 mb-2\">Erreur lors de la sauvegarde de l'image, veuillez recommancer.</div>";
            }
        }else{
            echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.</div>";
        }
    }else{
        switch ($_FILES["image"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
                echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Le fichier téléchargé dépasse la taille maximale autorisée.</div>";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Le fichier téléchargé dépasse la taille maximale autorisée par le formulaire.</div>";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Le fichier n'a été que partiellement téléchargé.</div>";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Aucun fichier n'a été téléchargé</div>.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Un dossier temporaire est manquant.</div>";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Échec de l'écriture du fichier sur le disque.</div>";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "<div class=\"alert alert-warning mt-2 mb-2\"><b>Erreur :</b> Le téléchargement du fichier a été arrêté par une extension PHP.</div>";
                break;
            default:
                echo "Erreur inconnue : " . $_FILES["image"]["error"];
                break;
            }
        }
    }
}
?>