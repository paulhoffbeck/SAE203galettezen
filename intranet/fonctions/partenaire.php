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
        <tr>
            <th>logo</th>
            <th>Nom</th>
            <th>E-mail</th>
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
        echo("<tr><form method='POST'>");

        echo("<td><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\" src=\"./img/parter/".$value["image"]."\" width=\"28px\"></td>");
        echo("<td> <input name='newnom' class='form-control' value='".$value["nom"]."'></td>");
        if($value["fournisseur"]=="oui"){$fourn='checked';}else{$fourn='';} 
        echo("<td> <input type='checkbox' name='newfour' ".$fourn."><label for 'newfour'>fournisseur</p></td>");
        echo("<td> <input name='newimage' class='form-control' value='".$value["image"]."'></td>");
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
        $donnee[$_POST["cle"]]["image"]=$_POST["newimage"];
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
?>