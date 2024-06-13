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
            <h1 class="mb-4">Site vitrine :</h1>
            <h4 class="mb-4">Cette partie du site est composée d'une interface web qui n'a pas besoin de connexion pour y accéder.</h4>
            <p>Situé sur le port 80, ce site présente l'entreprise de manière générale avec :</p>
            <ul class="list-group mb-5">
                <li class="list-group-item">
                    <h5 class="mt-3">Une page d'Accueil</h5>
                    <p>Cette page est la première page qui s'affiche lorsque l'on tape l'adresse IP du serveur.</p>
                    <p>Elle est composée d'un carousel. C'est aussi sur cette page que la barre de navigation et le footer sont le plus mis en avant.</p>
                    <p>Pour un rendu plus professionnel, nous avons mis une photo en bande en fond d'écran.</p>
                    <strong>Nous présenterons les différentes fonctions un peu plus bas.</strong>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une page partenaire</h5>
                    <p>Cette page liste tous les partenaires de l'entreprise.</p>
                    <p>Elle les place ensuite dans des cardes avec le logo de l'entreprise, son nom et une courte description.</p>
                    <p>Pour afficher ces partenaires, nous faisons appel a une fonction qui vient parcourir le fichier json contenant les différents partenaires avec une boucle foreach puis viens afficher leurs différentes caractéristiques.</p>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une page qui sommes nous</h5>
                    <p>Cette page viens, comme pour la page partenaire, parcourir un dossier comportant tous les membres de l'entreprise puis viens les afficher dans des cardes avec une fonction foreach.</p>
                    <p>La petite particularité de cette page par rapport à la précédente est que les employés peuvent choisir de ne pas être affiché, une condition de présence ou d'absence de variable est donc ajoutée. </p>
                    <p>Nous y avons aussi ajouté certains membres de l'équipe de développement.</p>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une page histoire</h5>
                    <p>La page histoire affiche une frise chronologique originale de l'histoire de l'entreprise.</p>
                    <p>Celle-ci est composée de cards pour lesquelles quand nous passons dessus, la couleur des éléments proches changent.</p>
                    <p>Il est important de souligner qu'aucun CSS customisé n'a été utilisé pour cette page.</p>
                    <p>Nous utilisons donc une liste d'id qui verra sa couleur changer selon quel objet est survolé.</p>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une page activité</h5>
                    <p>Cette page liste tous les produits vendus par l'entreprise dans des cards. Nous y avons aussi mis des boutons qui renvoient vers des pages expliquant la nature de ces produits pour les clients les plus éloignés de la Bretagne.</p>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une page contact</h5>
                    <p>Cette page est la seule page du site vitrine qui soit directement en lien avec l'intranet.</p>
                    <p>C'est pour cela que nous avons mis un point d'honneur à sécuriser au maximum toutes les informations entrées depuis cette interface.</p>
                    <p>Celle-ci est composée d'un formulaire demandant des informations personnelles ainsi que le sujet et le message du contact. Cette page sert essentiellement au report de problèmes ou de demande de partenariat ainsi qu'à du feedback. Lorsque le bouton d'envoi est cliqué, une fonction est exécutée que nous expliquerons plus tard dans la page.</p>
                </li>
            </ul>
            <h4 class="mb-4">Présentations des différentes fonctions du fichier fonction</h4>
            <ul class="list-group mb-5">
                <li class="list-group-item">
                    <h5 class="mt-3">Une fonction sidebar</h5>
                    <p>Cette fonction affiche une barre de navigation verticale qui renvoie vers les différents liens du site.</p>
                    <p>Nous y trouvons aussi deux images en bas de page.</p>
                    <p>Elle est par défaut activée mais peut être rétractée grâce à une fonction en JavaScript.</p>
                    <p>La suite de balises br est la seule solution trouvée pour placer les icônes en bas de page sans trop utiliser de CSS personnalisé. Nous tenons à préciser que toutes les solutions ont été tentées mais qu'aucune n'étaient satisfaisantes.</p>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une fonction footer</h5>
                    <p>Cette fonction affiche un pied de page avec un court résumé des pages affichées dans le site.</p>
                    <p>Les différents liens présents renvoient vers les pages respectives.</p>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une fonction traitementcontact</h5>
                    <p>Cette fonction traite les éléments envoyés par la page contact.</p>
                    <p>Avant de l'envoyer, celle-ci transforme l'intégralité des informations envoyées en caractères dits non exécutables afin d'éviter d'éventuelles attaques sur notre site.</p>
                    <p>Cette fonction prend aussi la date d'envoi afin de classer les contacts.</p>
                    <p>Nous créons ensuite une nouvelle instance du fichier contactlist situé dans l'intranet que nous remplissons par les variables 'désinfectées'.</p>
                    <p>Cette instance est ensuite collée au fichier existant avec un UID permettant son identification en vue d'éventuelles manipulations.</p>
                    <p>Voir page intranet.</p>
                </li>
                <li class="list-group-item">
                    <h5 class="mt-3">Une fonction action</h5>
                    <p>Cette fonction sert à afficher ou dés-afficher la navbar.</p>
                    <p>Son fonctionnement est simple : dès qu'un élément portant l'id toggleButton est cliqué, celle-ci affiche ou fait disparaître la barre de navigation.</p>
                    <p>Pour cela, la fonction regarde l'état de l'attribut display et le change le cas échéant.</p>
                </li>
            </ul>
        </div>
    </main>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
