<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide des classes personnalisées</title>
    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style-vitrine.css" rel="stylesheet">
</head>
<body>
    <?php include 'fonctions/navbar.php'; ?>
    <div class="container">
        <center><h1 class="mt-3 mb-5">Guide class moutarde</h1></center>
        <div class="row">
            <div class="col-md-6">
                <h4>.text-moutarde</h4>
                <pre><code>&lt;span class="text-moutarde"&gt;Texte avec cette couleur&lt;/span&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <span class="text-moutarde">Texte avec cette couleur</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.bg-moutarde</h4>
                <pre><code>&lt;div class="bg-moutarde"&gt;Element div avec un fond&lt;/div&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <div class="bg-moutarde">Element div avec un fond</div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.border-moutarde</h4>
                <pre><code>&lt;div class="border border-moutarde"&gt;Element div avec un contour&lt;/div&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <div class="border border-moutarde">Element div avec un contour</div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.btn-moutarde</h4>
                <pre><code>&lt;button class="btn btn-moutarde"&gt;Bouton personnalisé&lt;/button&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <button class="btn btn-moutarde">Bouton personnalisé</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.list-group-item-moutarde</h4>
                <pre><code>&lt;li class="list-group-item list-group-item-moutarde"&gt;Élément de liste personnalisé&lt;/li&gt;</code></pre>
                <h4>.list-group-item-moutarde.active</h4>
                <pre><code>&lt;li class="list-group-item list-group-item-moutarde active"&gt;Élément de liste actif personnalisé&lt;/li&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-moutarde">Élément de liste personnalisé</li>
                    <li class="list-group-item list-group-item-moutarde active">Élément de liste actif personnalisé</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.badge-moutarde</h4>
                <pre><code>&lt;span class="badge badge-moutarde"&gt;Badge personnalisé&lt;/span&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <span class="badge badge-moutarde">Badge personnalisé</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.table-moutarde</h4>
                <pre><code>&lt;table class="table table-moutarde"&gt;...&lt;/table&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <table class="table table-moutarde">
                    <thead>
                        <tr>
                            <th>En-tête de tableau</th>
                            <th>En-tête de tableau</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Donnée de tableau</td>
                            <td>Donnée de tableau</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.table-hover avec .table-moutarde</h4>
                <pre><code>&lt;table class="table table-moutarde table-hover"&gt;...&lt;/table&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <table class="table table-moutarde table-hover">
                    <thead>
                        <tr>
                            <th>En-tête de tableau</th>
                            <th>En-tête de tableau</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Donnée de tableau</td>
                            <td>Donnée de tableau</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
