<?php
function partenaires(){
    $partData = file_get_contents('../intranet/database/partenaire.json', true);
    $partTable = json_decode($partData, true);


    echo("<div class=\"container mt-5\">
    <div class='row'>");


    
    foreach($partTable as $key => $value){
        if ($value["montrer"]=="oui") {
        echo("<div class=\"col-3 mb-4\">
                <div class=\"card mb-4 d-flex h-100 flex-column\">
                    <img src=\"../intranet/img/parter/".$value["image"]."\" class=\"card-img-top img-fluid\" alt=\"\"\>
                    <div class=\"card-body\">
                        <h5 class=\"card-title border-top pt-2\">".$key."</h5>
                        <p class=\"card-text\">".$value["description"]."</p>
                        <a href=\"".$value["lien"]."\" class=\"btn btn-moutarde mt-auto\">visiter</a>
                    </div>
                </div>
            </div>
            ");
        }
    }
    echo("</div>
            </div>");
}
?>