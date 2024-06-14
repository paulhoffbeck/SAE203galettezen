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
        
        <h3> l'envoie de Mail </h3> 
        <ul>
            <li>presentation de l'api emailjs</li>
            <li>utilisation dans notre code</li>
        </ul>

        <h5>l'api emailjs</h5>
       Pour réaliser l'envoie de mail, nous avons utilisé l'api emailjs. celle ci nous permet donc de gerer les envoie d'email grace a la fonction emailjs.send().
       Cette dernière permet de demander au site emailjs d'aller recuperer dans un certain service le template specifier en parametre de la fonction et de renplacer toutes les variables de ce template par des valeurs specifier en argument de la fonction.

       <h5>utilisation dans notre code</h5>
       Pour l'utiliser dans notre code, nous avons creer deux templates sur le site de emailjs. Un premier qui permet de verification du compte en cours d'incription et un second qui permet a un utilisateur d'etre mis au courant quand son compte a été modifié
       Pour le premier, nous utilisons un numero aleatoire généré entre 000000 et 999999 qui sera dans un premier temps stocké dans le fichier json ou l'utilisateur est rensigné et ensuite ce numero est mis dans le mail pour que l'utilisateur puisse le rentrer dans une page de verification.
       Pour le second template, il nous sert juste a informer l'utilisateur que son compte a été modifier. le template est donc assez simple, il est mis au courant de la modification et de la personne qui a modifié son compte. 
    
    
        </div>
    </main>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>