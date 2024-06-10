<?php
include '../fonctions/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>GaleteZen - Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <?php 
    if(isset($_POST["contact"])){
        traitementcontact();
    }
    ?>
    <div class="bg-crue">
        <div class="d-flex">
            <?php
              sidebar();
              ?>
            <div class="p-3 flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <button id="toggleButton" class="btn btn-ketchup">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                    </button>        
            <div class="d-flex align-items-center">
                        <img src="../intranet/img/logo.png" alt="logo" style="width: 80px;">
                        
            </div>
            </div>
            <div class="text-center">
                    <h1>Contact</h1>
                    <h5>Une question, une remarque, un partenariat ?</h5>
                    <div class="container mt-5">
        <h2 class="text-center mb-4">Contactez-nous</h2>
        <form name="contact" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Sujet</label>
                <input type="text" class="form-control" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="5" required></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" name="contact" class="btn btn-moutarde">Envoyer</button>
            </div>
        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      action();
    </script>
</body>
<?php
footer();
?>
</html>
