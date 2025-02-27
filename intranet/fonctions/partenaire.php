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
    
    echo('<br>');
    echo '<div class="container mb-5">';
    
    echo('<br>');
    echo '<h1 class="my-4">Liste de nos Partenaires</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <form method="POST">
                    <th class="bg-turquoise border-turquoise">Rechercher un nom</th>
                    <th class="bg-turquoise border-turquoise"><input class="bg-turquoise border-0" type="text" name="nomchercher" placeholder="Chercher par Nom"></th>
                    <th class="bg-turquoise border-turquoise"><button type="submit" name="rechercher" class="btn btn-pastel">Appliquer</button></th>
                </form>
                    <th class="bg-turquoise border-turquoise">
                        <button  name="ajouter" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-pastel">+</button>

                    </th>
            </tr>

        </thead>
    </table>';

echo'
    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>logo</th>
            <th>Nom</th>
            <th>fournisseur</th>
            <th>montrer</th>';
            if(hasPermission("modo","manage-partenaires")){
            echo'<th>image</th>';}
            echo'<th>lien</th>
            <th>description</th>';
            if(hasPermission("modo","manage-partenaires")){
            echo'<th>modifier</th>
                 <th>supprimer</th>';
            }
        echo'</tr>
    </thead>
    
    <tbody>';
    
    foreach ($tab as $key => $value) {
        if(hasPermission("modo","manage-partenaires")){
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

        echo("<td><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\" src=\"./img/parter/".$key.".png\" width=\"28px\"></td>");
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
        echo("<td><form  method='POST'> 
        <input type=\"hidden\" name=\"elementadel\" value='$key'>
        <button type=\"submit\" class=\"btn btn-danger\">supprimer</button>
        </form></td>");
    }else{
        echo("
              <tr>
              <td><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\" src=\"./img/parter/$key.png\" width=\"28px\"></td>
              <td>".$value["nom"]."</td>
              <td>".$value["fournisseur"]."</td>
              <td>".$value["montrer"]."</td>
              <td>".$value["lien"]."</td>
              <td>".$value["description"]."</td>
             </tr>
         ");
    }
}
    echo'</tbody></table></div>';
    
}

function affiche(){
    if (isset($_POST["nomchercher"])){
        $donnee = recherche($_POST["nomchercher"]);

    }else{
        ajoutpart();
        $json = file_get_contents('database/partenaire.json');
        $donnee = json_decode($json, true);
    }
    return $donnee;
}


function modifier(){
    if(isset($_POST["cle"]) && isset($_POST["newnom"])){

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
        changeImage('/img/parter/',$_POST["cle"].".png");
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



function ajoutpart(){
    $uid = uniqid();


    echo'<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Ajouter un partenaire</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3">';


    echo("<form method='POST' enctype='multipart/form-data'><input placeholder='nom' name='nom' class='form-control mb-3' required>");
    echo("<input type='checkbox' name='fournisseur'><label for='fournisseur' class='mb-3'>fournisseur </label> <br>");
    echo("<input type='checkbox' name='montrer' class='mb-3' checked><label for='montrer'>montrer</label>");
    echo("<input type='file' name='image' class='form-control  mb-3' accept='image/*'>");
    echo("<input placeholder='lien' name='lien' class='form-control  mb-3' required>");
    echo("<textarea placeholder='desciption' name='description' class='form-control mb-3' required></textarea>");
    echo("
            <button type='submit' class='btn btn-primary'>creer</button>
            <input type='hidden' name='cle' value='$uid'>
          ");
    echo("</form> ");

echo'</div>

    </div>
  </div>
</div>';



    if(isset($_POST["nom"])){
        $test = false;
        $json = file_get_contents('./database/partenaire.json');
        $donnee = json_decode($json, true);

        foreach ($donnee as $key => $value) {
            if($_POST["nom"] == $value["nom"]){
                $test = true;
            }
        }

        if ($test == false){

            if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK){
                $Dir = './img/parter/';
                $fichier = $_POST["cle"].".png";
                changeImage($Dir,$fichier);
            }

            $data = array(
                "description" => $_POST["description"],
                "lien" => $_POST["lien"],
                "montrer" => isset($_POST["montrer"]) ? true : false,
                "fournisseur" => isset($_POST["fournisseur"]) ? true : false,
                "nom" => $_POST["nom"]
            );
            $donnee[$_POST["cle"]] = $data;
        }
        
        $file = json_encode($donnee, JSON_PRETTY_PRINT);
        file_put_contents("./database/partenaire.json", $file);
             
    }
}

function suppr($id){
    $json = file_get_contents('./database/partenaire.json');
    $donnee = json_decode($json, true);

    unset($donnee[$id]);

    $file = json_encode($donnee, JSON_PRETTY_PRINT);
    file_put_contents("./database/partenaire.json", $file);
}
?>

