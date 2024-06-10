<!doctype html>
<html lang="fr">
<head>
    <title>GaleteZen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-pastel">
    <?php
    session_start();
    require_once __DIR__ . '/controleurs/UserController.php';
    require_once __DIR__ . '/controleurs/AccountController.php';
    include __DIR__ . '/vues/navbar.php';

    $page = $_GET['page'] ?? 'index';
    switch ($page) {
        case 'index':
            break;
        case 'collaborateurs':
            $controller = new UserController();
            $controller->listUsers();
            break;
        case 'login':
            $controller = new AccountController();
            $controller->logger();
            break;
        default:
            echo 'Page not found';
            break;
    }
    ?>
</body>
</html>
