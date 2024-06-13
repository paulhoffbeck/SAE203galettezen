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
        <h5>La page client fait appel à la fonction client. Sur cette fonction, on y retrouve plusieurs fonctionnalité :
        <ul>
            <li>Le tableau de présentation des clients</li>
            <li>La fonctionnalité pour <b>ajouter</b> un client</li>
            <li>La fonctionnalité pour <b>modifier</b> un client</li>
            <li>La fonctionnalité pour <b>supprimer</b> un client</li>
            <li>La fonctionnalité pour <b>télécharger</b> la fiche client</li>
        </ul></h5>
        <h5>La tableau</h6>
        Grace à l'outil "foreach()" nous ajoutons une ligne au tableau pour chaque client présent dans le fichier clients.json.<br>
        Nous récupérons les informations dans des variables ($user) et les affichons en fonction de ce que nous souhaitons faire.<br>
        Les champs renseigner sont :
        <ul>
            <li>Le nom</li>
            <li>Le prénom</li>
            <li>La date de naissance</li>
            <li>L'adresse mail</li>
            <li>Le numéro de téléphone</li>
            <li>Le type de client (particuler ou entreprise)</li>
            <li>L'adresse</li><ul>
                <li>Le pays</li>
                <li>La ville</li>
                <li>Le code postal</li>
                <li>La rue</li>
            </ul>
            <li>La langue parlé</li>
        </ul>
        <h5>L'ajout d'utilisateur</h6>
        Pour ajouter un utilisateur, nous utilisons un modal bootstrap. Un modal est une petite fenêtre qui s'ouvre directement sur la page actuelle afin d'y afficher n'importe quelle type d'information.<br>
        Dans le corps du modal nous intégrons un formulaire avec tous les champs qui sont ceux afficher dans le tableau.<br>
        Nous ajoutons un petit bouton d'envoi qui transmet ce formulaire pour traiter l'ajout.<br>
        <br>
        <h5>La modification d'un utilisateur</h6>
        Pour la modification d'un utilisateur nous reprenons le même model que pour l'ajout, c'est à dire le modal. Nous créons un modal à l'aide du foreach pour chaque client en fonction de son uid.<br>
        Lorsque nous sélectionnons un profil de client pour le modifier, l'uid du client est envoyer et c'est ce modal en fonction des caractéristique du client qui est afficher.<br>
        Nous reprenons le format du formulaire de création mais inserons dans les champs "value" les informations du clients pour quelles soit modifier si nécessaire.<br>
        Lors du renvoi de ce formulaire toutes les informations sont récupérées et ré-écrites dans le fichier json en remplacement des anciennes.
        <br>
        <br>
        <h5>La suppression d'un utilisateur</h6>
        Pour la suppression, la procédure est toute simple. Nous avons créer une fonction (aussi utilisé pour les partenaires) qui supprime toutes les informations en fonction de l'uid envoyer.<br>
        Lorsque nous appuyons sur le bouton de suppression, un formuliare en méthode POST est envoyé avec comme paramètre l'uid du client. 
        Sur la page client, si une variable "$_POST" avec le nom de suppression est détecté, la fonction de suppression est appelé. La fonction supprime toutes les informations en fonction de l'uid à l'aide de l'outil "unset()".
        <br>
        <br>
        <h5>Le téléchargement de la fiche client</h6>
        Dans le cahier des charges, nous devions créer une fonctionnalité pour télécharger une fiche client. Pour cela, nous avons créé une page annexe qui est appelé pour un bouton et qui envoie en méthode GET l'uid du client.<br>
        La fonction de téléchargement récupère l'uid et créer un tableau avec ces informations là. Puis à la fin de la page un script javascript est appelé pour "imprimé" la page actuelle via "window.print()".<br>
        Cela permet de télécharger ou d'imprimé la page avec les informations du client. Finalement un header effectue un renvoie automatique sur la page de base avec le tableau. 
        </div>
        
    </main>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
