<?php

require_once ("fonctions/main.php");
head();
navbar();
?>

<h1>inscription</h1>


<div class="card">

    <div class="card-body">
        
    <form action="traitement-inscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>




        </form>

    </div>

  
</div>


<?php

footer();

?>

</body>
</html>