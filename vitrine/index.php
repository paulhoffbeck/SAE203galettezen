<?php
include '../functions/functions.php'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaleteZen - Accueil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>
<<<<<<< Updated upstream
    <div class="container-fluid">
    <div class="row flex-nowrap">
    
=======

    <?php session_start(); 
    echo '<div class="container-fluid">';
    include("functions.php"); 
    

    ?>

    <div class="container">
        <h1>Bienvenue sur mon site de partage de voiture</h1>
        <p>Vous êtes actuellement connecté en tant que <?=  $username ?></p>
    <?php
    
    ?>
    <?php basdepage(); ?>
>>>>>>> Stashed changes
</body>

</html>
