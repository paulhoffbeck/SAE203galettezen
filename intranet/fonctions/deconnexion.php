<?php
function deconnexion(){
    if(isset($_SESSION['uid']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['email']) && isset($_SESSION['role_uid'])){
        session_unset();
        session_destroy();
        header("Refresh:0");
    }
    echo "<a href='index.php'>Déconnexion validé, au revoir</a>";
}
?>