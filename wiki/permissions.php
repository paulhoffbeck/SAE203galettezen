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
            <h1 class="mb-4">Gestion des permissions :</h1>
            <h4 class="mb-4">Les permissions sont une partie importante de l'organisation de notre intranet</h4>
            <p>Nous avons en effet décidé d'attribué une série de permission selon le rôle de chaque utilisateur. Pour se faire, nous avons commencés par créer la base de donnée "permission" qui stockera toutes les banques de permissions.</p>
            <p>Ainsi, la base de donnée des permissions est composée de 3 banques de permissions différentes :</p>
            <ul class="list-group mb-5">
                <li class="list-group-item">
                    <h5 class="mt-3">general</h5>
                    <p>Cette banque regroupe toutes les permissions basiques qu'un utilisateur normal doit avoir tel que : </p>
                    <ul>
                        <li><p>Accéder à son profil</p></li>
                        <li><p>Accéder à la page collaborateur</p></li>
                        <li><p>Accéder à la page client</p></li>
                        <li><p>Accéder à la page wiki</p></li>
                        <li><p>Accéder aux fichiers partagés</p></li>
                        <li><p>Accéder à la page de contact</p></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">modo</h5>
                    <p>Cette banque regroupe toutes les permissions que des modérateurs peuvent utiliser</p>
                    <ul>
                        <li><p>Afficher la page des rôles ainsi que la liste des rôles</p></li>
                        <li><p>Afficher la liste des membres d'un rôles</p></li>
                        <li><p>Afficher les permissions de tous les rôles de la liste</p></li>
                        <li><p>Création d'un utilisateur de manière administrative</p></li>
                        <li><p>Afficher la liste des nouveaux comptes en attente de validation</p></li>
                        <li><p>Traiter un nouveau compte en attente de validation</p></li>
                        <li><p>Modifier les informations d'un compte utilisateur (Nom, Prenom, Téléphone)</p></li>
                        <li><p>Définir un nouveau rôle/poste à un compte utilisateur</p></li>
                        <li><p>Modifier le mot de passe d'un compte utilisateur</p></li>
                        <li><p>Gérer les partenaires</p></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">admin</h5>
                    <p>Cette banque regroupe toutes les permissions que des administrateurs peuvent utiliser</p>
                    <ul>
                        <li><p>Modifier les permissions de tous les rôles de la liste</p></li>
                        <li><p>Créer un nouveau rôle dans la liste</p></li>
                        <li><p>Afficher les activités de niveaux Critique</p></li>
                        <li><p>Afficher les activités de niveaux Avertissement</p></li>
                    </ul>
                </li>
            </ul>
            <h4 class="mb-4">Une fois cette banque de permissions crées, nous attribuons ces trois grand rôles à tous nos utilisateurs grâce à leur rôle uid dans le fichier user. Cet uid permet d'identifier la personne dans le fichier role.</h4>   
            <p>Dans ce fichier rôle, nous définissons utilisateur par utilisateur les permissions qu'il possède selon la banque à laquelle il appartient et selon son poste dans l'entreprise.</p>
            <p>Si nous prenon comme exemple un utilisateur inscrit dans la banque de permission "générale"; il ne pourra avoir au maximum que les permissions inhérantes à la banque générale. Il pourra en avoir moins mais il ne pourra jamais en avoir plus.</p>
            <p>A l'inverse, un utilisateur inscrit comme "administrateur" aura aussi acces aux deux autres banques de permissions. Cependant, il est tout à fait possible qu'il se retire certaine permissions de la banque générale car elles sont inutiles</p>
            <p>Ainsi, avec cette méthode, l'attribution des permissions se fait au cas par cas et est très personnalisée</p>
            <p>Enfin, selon ces permissions, et avec une simple conditions qui vérifie l'existence de la permission, il est ainsi aisé de vérifier si un utilisateur possède ou non les droits pour accéder ou afficher certaines parties du site.</p>
        </div>
    </main>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
