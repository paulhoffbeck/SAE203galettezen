<!doctype html>
<html lang="fr">
<head>
    <title>GaleteZen - Inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            emailjs.init("Yp4lst8YrH7O71nQi");
        })();
    </script>
</head>
<body class="d-flex flex-column min-vh-100 bg-pastel">


<?php

require_once('fonctions/main.php');
head(); 
navbar();

$fichierutilisateur = file_get_contents('./database/contactlist.json');
$tableauutilisateur = json_decode($fichierutilisateur, true);
?>
<div class="container">
<div class="row">
<?php

foreach($tableauutilisateur as $key => $contact) {
    echo '<div class="col-3 mb-4 mt-4">';
    echo '<div class="card mb-4 d-flex h-100 flex-column" style="width: 18rem;">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">Sujet : ' . $contact['sujet'] . '</h5>';
    echo '<p class="card-text">Publié le : ' . $contact['date'] . '</p>';
    echo '<p class="card-text">De Mr/Mme : ' . $contact['nom'] . '</p>';
    echo '<p class="card-text">' . $contact['message'] . '</p>';
    echo '<p class="card-text"><a href="mailto:'.$contact['mail'] .'">'.$contact['mail'].'</a></p>' ;
    echo '</div>';
    echo '<form action="" method="POST">';
    echo '<input type="hidden" name="contact_id" value="' . $key . '">';
    echo '<button type="submit" class="btn btn-danger" name="supprimer_contact">Supprimer</button>';
    echo '</form>';
    
    echo'</p>';
    echo '</div>';
    echo '</div>';
    
    
}


if(isset($_POST['supprimer_contact']) && isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];
    unset($tableauutilisateur[$contact_id]);
    file_put_contents('./database/contactlist.json', json_encode($tableauutilisateur, JSON_PRETTY_PRINT));
    echo "<script>window.location.href = 'contact.php';</script>";
    exit;
}
?>
    </div>
</div>
<?php
footer();
?>

</body>
</html>