<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki GaleteZen</title>
    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style-intranet.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'fonctions/navbar.php'; ?>
    <main>
        <div class="container marketing mt-5">
            <h4>Généralité de l'explorateur de fichier :</h4>
            <p>Le gestionnaire de fichier de l'intranet est disponible uniquement pour les personnes qui sont connécté sur l'intranet et qui possède un rôle attribuant la permission <i>"<i class="fa-solid fa-folder-tree"></i> Accéder à l'espace de fichiers partagés"</i>. Il permet de créer une arborécence de dossier et d'y stocker des fichiers sur le serveur. Cela permet d'avoir un accès aux ressources depuis différents points et de partager le contenu entre un groupe défini d'utilisateur ou bien tous les utilisateurs ayant eux aussi accès à l'outil.</p>
            <hr>
            <div class="row">
                <div class="col">
                    <h4>L'ajout d'un dossier :</h4>
                    <p>Il intègre donc un moyen de naviguer de dossier à dossier en cliquant tous simplement sur le nom du dossier. Il est possible de créer un dossier en cliquant sur <span class="btn btn-sm btn-ciel"><i class="fa-solid fa-folder-plus"></i> Dossier</span> une feunetre va souvrir affichant :</p>
                    <p>Il ne suffis qu'à entrer le nom souhaité pour le dossier, puis de faire <span type="button" class="btn btn-turquoise">Créer</span> pour que celui-ci soit créé dans le chemin actuel ou vous vous trouvez. Par défaut, un dossier est créé avec un accès "<i class="fa-solid fa-lock text-danger"></i> Privé(e)" signifiant que seul vous avez le droit d'accéder à cette ressource.</p>
                </div>
                <div class="col">
                    <div class="modal position-static d-block">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Créer un dossier</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="FolderNamer">Nom du dossier</label>
                                    <input type="text" id="FolderNamer" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-turquoise">Créer</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h4>L'ajout d'un fichier :</h4>
                    <p>Le système de gestionnaire de fichier intègre un système permettant de gérer l'enregistrement de fichiers dans des dossiers. Il est possible de les importer par 2 méthodes. La première étant de cliquer sur le bouton <span class="btn btn-sm btn-ciel"><i class="fa-solid fa-file-circle-plus"></i> Fichier</span> afin d'accéder à la feunêtre ci-contre. Ainsi, vous pouvez selectionnez le fichier que vous souhaiter importer dans le serveur de fichier.</p>
                    <p>Une seconde option est de glisser des fichiers sur la zone de l'explorateur afin que le site les charges et affiche directement la feunêtre avec les ressources séléctionnées. Une fois les ressources choisies, il ne vous reste plus qu'à faire <button type="button" class="btn btn-turquoise">Télécharger</button> pour que cela soit envoyé sur le serveur.</p>
                </div>
                <div class="col">
                    <div class="modal position-static d-block">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Télécharger un fichier</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="FileUploader">Choisir un fichier</label>
                                    <input type="file" id="FileUploader" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-turquoise">Télécharger</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h4>L'interface contextuelle :</h4>
                    <table class="table table-hover"><thead><tr><th>Nom</th><th>Taille</th><th>Propriétaire</th><th>Permissions</th><th></th></tr></thead><tbody><tr><td><a class="text-decoration-none text-dark" href="file-downloader.php?elementUID=6669de74848ff"><i class="fa-regular fa-file-lines"></i> Ma Ressource.pdf</a></td><td>154Ko</td><td>Wiki WIKI</td><td><i class="fa-solid fa-lock text-danger" title="Privé"></i></td><td><span class="text-dark text-decoration-none"><i class="fa-solid fa-ellipsis-vertical"></i></span></td></tr></tbody></table>
                    <p>On retrouve pour chaque élements, (fichier, ressource, raccourcis) la présence à droite de <i class="fa-solid fa-ellipsis-vertical"></i> permettant d'affichier un menu contextuel sur la droite de la page comme montrée ci-joit.</p>
                    <p>Il permet de modifier le nom de la ressource, en cliquant sur <span class="btn btn-sm btn-light"><i class="fa-solid fa-pen-clip"></i></span> qui transformera le nom en un champ de texte pour renommer le fichier.</p>
                    <p>Il permet de déplacer la ressource vers un autre lieu avec la fonction <span class="btn btn-sm btn-ciel"><i class="fa-solid fa-up-down-left-right"></i> Déplacer</span> qui vous séléctionnera la ressource et vous pourrez ensuite aller dans le dossier souhaité pour déplacer votre ressource à cet endroite.</p>
                    <p>La fonction <span class="btn btn-sm btn-ciel"><i class="fa-solid fa-link"></i> Raccourcis</span> permet de créer un raccourcis vers la ressource que vous pouvez ensuite déplacer dans un autre dossier pour accéder rapidement à votre ressource.</p>
                    <p><span class="btn btn-sm btn-outline-indigo"><i class="fa-regular fa-trash-can"></i> Supprimer</span> porte bien son non et permet de supprimer la ressource. Si c'est un dossier, toutes les ressources enfants du dossiers, sous-dossiers et raccourcis seront également supprimés.</p>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            Informations <span class="btn btn-sm btn-ciel ml-auto"><i class="fa-solid fa-xmark"></i></span>
                        </div>
                        <div class="card-body">
                            <div id="NameView">
                                <b>Nom : </b>Ma Ressource.pdf <span class="btn btn-sm btn-light"><i class="fa-solid fa-pen-clip"></i></span><br>
                            </div>
                            <b>Type : </b><i class="fa-regular fa-file-lines"></i> Fichier<br>
                            <b>Propriétaire : </b>Wiki WIKI<br>
                            <b>Accès : </b><i class="fa-solid fa-lock text-danger"></i> Privé(e) <span class="btn btn-sm btn-pastel"><i class="fa-solid fa-pen-to-square"></i></span>
                        </div>
                        <div class="btn-group">
                            <span class="btn btn-sm btn-ciel"><i class="fa-solid fa-link"></i> Raccourcis</span>
                            <span class="btn btn-sm btn-ciel"><i class="fa-solid fa-up-down-left-right"></i> Déplacer</span>
                            <span class="btn btn-sm btn-outline-indigo"><i class="fa-regular fa-trash-can"></i> Supprimer</span>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h4>Les permissions :</h4>
                <p>Dans l'interface contextuelle, on trouve également <span class="btn btn-sm btn-pastel"><i class="fa-solid fa-pen-to-square"></i></span> qui ouvre la section permissions de la ressource séléctionnée.</p>
                <p>Cet section est déjà très bien guidée via l'interface, elle permet de définir 4 modes de permissions associées à 4 icons :</p>
                <ul>
                    <li><i class="fa-solid fa-lock text-danger"></i> Privé(e) : Seul vous et uniquement vous avez tous les droits sur la ressource en question.</li>
                    <li><i class="fa-solid fa-unlock text-warning"></i> Partagé(e) : Définissez des accès par utilisateurs et/ou par rôle afin de gérer les actions qui seront effectuées.</li>
                    <li><i class="fa-solid fa-lock-open text-success"></i> Public : Tous le monde à accès à la ressource, définissez cependant les actions possibles.</li>
                    <li><i class="fa-regular fa-circle-question"></i> Hérite : Récupère les permissions de son parent. Si sont parent est aussi en mode "Herite", il remonte jusqu'à son plus parent avec des permissions déifinées sur les 3 autres modes</li>
                </ul>
                <span class="alert alert-info"><b>Bon à savoir : </b>La racine (/) est définie par défaut sur le mode "public" donc les élements héritiées seront natuellement en public également.</span>
            </div>
        </div>
    </main>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
