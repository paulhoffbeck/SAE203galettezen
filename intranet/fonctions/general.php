<?php
function getUserNameByUid($userUID){
    $json = file_get_contents('./database/user.json');
    $donnee = json_decode($json, true);
    if(isset($donnee[$userUID])){
        return $donnee[$userUID]['prenom'].' '.strtoupper($donnee[$userUID]['nom']);
    }else{
        return "Inconnu";
    }
}function changeImage($path,$namePNG){
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
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
            $target_file = $path . $namePNG;
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
?>