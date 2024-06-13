<?php
require_once('fonctions/functions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>GaleteZen - Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <div class="bg-crue">
        <div class="d-flex">
            <?php
              sidebar();
              ?>
            <div class="p-3 flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <button id="toggleButton" class="btn btn-ketchup">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                    </button>        
            <div class="d-flex align-items-center">
                    <a href="index.php"> 
                        <img src="./intranet/img/logo.png" alt="logo" style="width: 80px;">
                    </a>                      
                    </div>
                </div>               
                <div class="text-center">
                    <h1>Notre histoire :</h1>
                    <div class="container py-4">
        <div class="row no-gutters">
            <div class="col-sm"></div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span id="r1" class="badge rounded-pill bg-moutarde border border-moutarde">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div id="11" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm py-2">
                <div id="c1" class="card shadow" onmouseover="couleur1()">
                    <div class="card-body">
                        <div class="float-end text-muted small">1904</div>
                        <h4 class="card-title text-muted">Création de l'entreprise</h4>
                        <p class="card-text">Notre entreprise est au départ une petite entreprise familliale crée à Saint-Malo par Lucien Le Bouc et sa femme Germaine Le Bouc. Elle est dès le départ connue pour s'exporter dans des régions lointaines telles que Rennes ou Nantes.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm py-2">
                <div id="c2" class="card shadow" onmouseover="couleur2()">
                    <div class="card-body">
                        <div class="float-end text-muted small">1918</div>
                        <h4 class="card-title text-muted">Exportation des premières galettes à l'étranger</h4>
                        <p class="card-text">A la fin de la première guerre, les premières galettes sont exportées en Angletterre et aux Etats-Unis. Il est même dit  que le président des Etats-Unis en mangeait tout les matins.</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div id="21" class="col border-cuit  border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span id="r2" class="badge rounded-pill bg-cuit border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div id="22" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm"></div>
        </div>

        <div class="row no-gutters">
            <div class="col-sm"></div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div id="31" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span id="r3" class="badge rounded-pill bg-cuit border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div id="32" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm py-2">
                <div id="c3" class="card shadow" onmouseover="couleur3()">
                    <div class="card-body">
                        <div class="float-end text-muted small">1946</div>
                        <h4 class="card-title">Renforcement des liens avec l'étranger</h4>
                        <p>Nous avons ouvert notre distribution au Japon et en Allemagne après la Seconde Guerre Mondiale ce qui contribua à la reconstruction des deux pays.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm py-2">
                <div id="c4" class="card shadow" onmouseover="couleur4()">
                    <div class="card-body">
                        <div class="float-end text-muted small">1960</div>
                        <h4 class="card-title">Construction d'une nouvelle usine</h4>
                        <p>La fabrique étant devenue trop petite au vue du succès mondial, nous avons construit une nouvelle usine au même endroit avec une capacité de 50 000 produits à la journée.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div id="41" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span id="r4" class="badge rounded-pill bg-cuit border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div id="42" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm"></div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm"></div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div id="51" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span id="r5" class="badge rounded-pill bg-cuit border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div id="52" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm py-2">
                <div id="c5" class="card shadow" onmouseover="couleur5()">
                    <div class="card-body">
                        <div class="float-end text-muted small">29 mai 1982</div>
                        <h4 class="card-title">Premiers partenariat avec Amora</h4>
                        <p>Ce partenariat nous a fait entrer dans une toute nouvelle dimension car il a permit de nous implanter durablement sur chaque continent. Ce partenariat durable est toujours actif aujourd'hui</p>
                        <h6>C'est aussi lors de cet évènement si spécial que l'entreprise prit le nom de Galetzen</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm py-2">
                <div id="c6" class="card shadow" onmouseover="couleur6()">
                    <div class="card-body">
                        <div class="float-end text-muted small">1997</div>
                        <h4 class="card-title">Partenariat avec les producteurs locaux</h4>
                        <p>Ce partenariat durable avec les producteurs bretons nous a permis de nous implanter localement tout en soutenant l'agrciluture bretonne</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div id="61" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span id="r6" class="badge rounded-pill bg-cuit border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div id="62" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm"></div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm"></div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div id="71" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span id="r7" class="badge rounded-pill bg-cuit border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div id="72" class="col border-cuit border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm py-2">
                <div id="c7" class="card shadow" onmouseover="couleur7()">
                    <div class="card-body">
                        <div class="float-end text-muted small">2024</div>
                        <h4 class="card-title">Modernisation et vision durable</h4>
                        <p>La modernisation de l'entreprise, commencée pour les 120 ans de Galetezen, a une volonté de vision durable et futuriste.</p>
                        <h5> Plus qu'un agrandissement, c'est une véritable révolution !</h5>
                    </div>
                </div>
            </div>
        </div>


    </div>
      
      <script>
        let cards = [1,2,3,4,5,6,7];
        
        let passe = 1;

        function couleur1(){
          document.getElementById('c1').className = "card";
          document.getElementById('c2').className = "card shadow";
          document.getElementById('c3').className = "card shadow";
          document.getElementById('c4').className = "card shadow";
          document.getElementById('c5').className = "card shadow";
          document.getElementById('c6').className = "card shadow";
          document.getElementById('c7').className = "card shadow";
          trans(1);
          passe=1;
        }

        function couleur2(){
          document.getElementById('c1').className = "card shadow";
          document.getElementById('c2').className = "card";
          document.getElementById('c3').className = "card shadow";
          document.getElementById('c4').className = "card shadow";
          document.getElementById('c5').className = "card shadow";
          document.getElementById('c6').className = "card shadow";
          document.getElementById('c7').className = "card shadow";
          trans(2);
          passe=2;
        }

        function couleur3(){
          document.getElementById('c1').className = "card shadow";
          document.getElementById('c2').className = "card shadow";
          document.getElementById('c3').className = "card";
          document.getElementById('c4').className = "card shadow";
          document.getElementById('c5').className = "card shadow";
          document.getElementById('c6').className = "card shadow";
          document.getElementById('c7').className = "card shadow";
          trans(3);
          passe=3;
        }

        function couleur4(){
          document.getElementById('c1').className = "card shadow";
          document.getElementById('c2').className = "card shadow";
          document.getElementById('c3').className = "card shadow";
          document.getElementById('c4').className = "card";
          document.getElementById('c5').className = "card shadow";
          document.getElementById('c6').className = "card shadow";
          document.getElementById('c7').className = "card shadow";
          trans(4);
          passe=4;
        }
        
        function couleur5(){
          document.getElementById('c1').className = "card shadow";
          document.getElementById('c2').className = "card shadow";
          document.getElementById('c3').className = "card shadow";
          document.getElementById('c4').className = "card shadow";
          document.getElementById('c5').className = "card";
          document.getElementById('c6').className = "card shadow";
          document.getElementById('c7').className = "card shadow";
          trans(5);
          passe=5;
        }
        function couleur6(){
          document.getElementById('c1').className = "card shadow";
          document.getElementById('c2').className = "card shadow";
          document.getElementById('c3').className = "card shadow";
          document.getElementById('c4').className = "card shadow";
          document.getElementById('c5').className = "card shadow";
          document.getElementById('c6').className = "card";
          document.getElementById('c7').className = "card shadow";
          trans(6);
          passe=6;
        }
        function couleur7(){
          document.getElementById('c1').className = "card shadow";
          document.getElementById('c2').className = "card shadow";
          document.getElementById('c3').className = "card shadow";
          document.getElementById('c4').className = "card shadow";
          document.getElementById('c5').className = "card shadow";
          document.getElementById('c6').className = "card shadow";
          document.getElementById('c7').className = "card ";
          trans(7);
          passe=7;
        }

        
        function sleep(ms) {
          return new Promise(resolve => setTimeout(resolve, ms));
        }

        let centre = ["r1","11","21","r2","22","31","r3","32","41","r4","51","52","r5","61","r6","62","71","r7","72"];

        async function trans(futur){
          if (passe < futur) {
            let idc = "r" + futur;
            let ct ="r" + passe;
            while (idc != ct){
              ct=centre[centre.indexOf(ct)+1];
              if(ct[0]=="r"){
                document.getElementById(ct).classList.remove("bg-cuit");
                document.getElementById(ct).classList.add("bg-moutarde");
              }

              document.getElementById(ct).classList.add("border-moutarde");
              await sleep(33)

              if(centre[(centre.indexOf(ct)-1)][0]=="r"){
                document.getElementById(centre[(centre.indexOf(ct)-1)]).classList.add("bg-cuit");
                document.getElementById(centre[(centre.indexOf(ct)-1)]).classList.remove("bg-moutarde");
              }
              document.getElementById(centre[(centre.indexOf(ct)-1)]).classList.remove("border-moutarde");
              await sleep(33)
              
            
            }
          } else if(passe > futur){
            let idc = "r" + futur;
            let ct ="r" + passe;
            while (idc != ct){
              ct=centre[centre.indexOf(ct)-1];

              if(ct[0]=="r"){
                document.getElementById(ct).classList.remove("bg-cuit");
                document.getElementById(ct).classList.add("bg-moutarde");
              }
              document.getElementById(ct).classList.add("border-moutarde");

              await sleep(33)

              if(centre[(centre.indexOf(ct)+1)][0]=="r"){
                document.getElementById(centre[(centre.indexOf(ct)+1)]).classList.add("bg-cuit");
                document.getElementById(centre[(centre.indexOf(ct)+1)]).classList.remove("bg-moutarde");
              }
              document.getElementById(centre[(centre.indexOf(ct)+1)]).classList.remove("border-moutarde");
                
              await sleep(33)
              
            }
          }
        }
        
      </script>
                </div>
        </div>
    </div>
    <script>
      action();
    </script>
</body>
<?php
footer();
?>
</html>
