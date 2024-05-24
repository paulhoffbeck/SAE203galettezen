<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide des classes personnalisées</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../intranet/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"href="ketchup.html">Ketchup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="moutarde.html"">Moutarde</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crue.html">Crue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cuit.html">Cuit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="brule.html">Brule</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <li class="nav-item">
                    <a class="nav-link" href="couleurs.html">Couleurs</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <li class="nav-item">
                    <a class="nav-link" href="indigo.html">Indigo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="azur.html"">Azur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="turquoise.html">Turquoise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ciel.html">Ciel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="pastel.html">Pastel</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <center><h1 class="mt-3 mb-5">Guide class pastel</h1></center>
        <div class="row">
            <div class="col-md-6">
                <h4>.text-pastel</h4>
                <pre><code>&lt;span class="text-pastel"&gt;Texte avec cette couleur&lt;/span&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <span class="text-pastel">Texte avec cette couleur</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.bg-pastel</h4>
                <pre><code>&lt;div class="bg-pastel"&gt;Element div avec un fond&lt;/div&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <div class="bg-pastel">Element div avec un fond</div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.border-pastel</h4>
                <pre><code>&lt;div class="border border-pastel"&gt;Element div avec un contour&lt;/div&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <div class="border border-pastel">Element div avec un contour</div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.btn-pastel</h4>
                <pre><code>&lt;button class="btn btn-pastel"&gt;Bouton personnalisé&lt;/button&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <button class="btn btn-pastel">Bouton personnalisé</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.list-group-item-pastel</h4>
                <pre><code>&lt;li class="list-group-item list-group-item-pastel"&gt;Élément de liste personnalisé&lt;/li&gt;</code></pre>
                <h4>.list-group-item-pastel.active</h4>
                <pre><code>&lt;li class="list-group-item list-group-item-pastel active"&gt;Élément de liste actif personnalisé&lt;/li&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-pastel">Élément de liste personnalisé</li>
                    <li class="list-group-item list-group-item-pastel active">Élément de liste actif personnalisé</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.badge-pastel</h4>
                <pre><code>&lt;span class="badge badge-pastel"&gt;Badge personnalisé&lt;/span&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <span class="badge badge-pastel">Badge personnalisé</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>.table-pastel</h4>
                <pre><code>&lt;table class="table table-pastel"&gt;...&lt;/table&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <table class="table table-pastel">
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
                <h4>.table-hover avec .table-pastel</h4>
                <pre><code>&lt;table class="table table-pastel table-hover"&gt;...&lt;/table&gt;</code></pre>
            </div>
            <div class="col-md-6">
                <table class="table table-pastel table-hover">
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
</body>
</html>
