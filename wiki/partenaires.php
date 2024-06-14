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
        
        <h3> La page partenaires permet d'afficher tous les partenaires de notre entreprise. elle contient les fonctions suivantes : </h3> 
        <ul>
            <li>Le tableau de présentation des partenaires</li>
            <li>Un filtre de recherche</li>
            <li>la posibilité de modifier les informations des partenaires</li>
            <li>La fonctionnalité pour ajouter des partenaires</li>
            <li>La fonctionnalité pour supprimer des partenaires</li>
        </ul>

        <h5>le tableau</h5>
        Le tableau fonctionne avec une boucle foreach() qui, en fonction des permissions de l'utilisateur va soi afficher un tableau basique, soi afficher un tableau avec chaque ligne etant un formulaire. 
        la fonction partenaire($tab) prend en paramettre une array qu'il affichera ensuite sous forme de tableau.
        <br>
        <h5>la recherche par nom</h5>
        la recherche par nom se fait grace a une boucle foreach() qui elle meme  contient une boucle for(). Elle vient tester pour tous les noms toutes les suites de caracteres qui ont la meme longueur que la chaine rechercher.
        la fonction affiche() va decider d'afficher ce tableau dans dans la fonction partenaires au lieu du tableau en entier.
        <br>
        <h5>modification de partenaires</h5>
        Pour modifier les partenaires, nous utilisons un formulaire pour les personnes ayant les droits de modification. en effet, nous allons recuperer l'id du partenaire et venir modifier ses informations dans le fichier json. Pour la modification d'image, nous utilisons la fonction changeImage() que nous avons creer et nous utilisons la variable $_FILES pour enregister les fichiers.
        <br>
        <h5>La fonctionnalité pour ajouter des partenaires</h5>
        Pour ajouter un partenaire, nous avons creer un modal qui contient un formulaire et qui vient tester par le nom si un partenaire existe deja Sinon, il l'ajoute dans la base de donnée et si une image est donnée, il va l'enregister dans le dossier img/parter.
        <br>
        <h5>La fonctionnalité pour supprimer des partenaires</h5>
        Pour supprimer un partenaire, nous creons un formulaire qui ne contient que un bouton et a pour champ caché l'id du partenaire.


    
    
        </div>
    </main>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>