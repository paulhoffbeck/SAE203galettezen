<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki GaleteZen</title>
    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'fonctions/navbar.php'; ?>
    <main>
        <div class="container marketing mt-5">
        <h5>La page collaborateur fait appel à la fonction collaborateur du dossier fonction. Sur cette fonction, on y retrouve plusieurs fonctionnalité :
        <ul>
            <li>Le tableau de présentation des collaborateurs</li>
            <li>Un filtre de recherche</li>
            <li>La fonctionnalité pour <b>observer</b> les informations des collaborateurs</li>
        </ul></h5>
        <h5>La tableau</h6>
        Tout comme pour la page client, la page collaborateur contient un tableau d'affichage des collaborateur.<br>
        Grace à l'outil "foreach()" nous ajoutons une ligne au tableau pour chaque collaborateur présent dans le fichier collaborateurs.json.<br>
        Nous récupérons les informations dans des variables ($user) et les affichons en fonction de ce que nous souhaitons faire.<br>
        Les champs renseigner sont :
        <ul>
            <li>La photo de profil</li>
            <li>Le nom</li>
            <li>Le prénom</li>
            <li>Le poste</li>
            <li>L'adresse mail</li>
            <li>Le numéro de téléphone</li>
        </ul>
        <h5>Le filtre de recherche</h6>
        Le filtre de recherche effectue un tri. Soit le champs envoyer est vide, alors le filtre ne tient pas compte de ce champ, 
        soit il va chercher dans le ficher collaborateur.json afin de trier la ou les valeur(s) voulu. Cette condition est vérifier par un simple "if".<br>
        Par défaut, si aucun filtre n'est envoyer, tous les collaborateurs sont affichés.
        <br>
        <h5>Informations</h6>
        Nous avons créé un modal afin de connaitre les informations plus précise des collaborateurs. Comme pour la page client, nous créons un modal pour chaque collaborateur en fonction de l'uid.
        Lorsque nous appuyons sur un bouton d'un collaborateur, le modal avec les informations de celui ci est affiché avec les mêmes paramètres que le tableau en plus visible. 
        Par exemple la photo de profil est plus visible que dans le tableau.
        <br>

        </div>
    </main>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>