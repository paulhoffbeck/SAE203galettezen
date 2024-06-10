<!doctype html>
<html lang="fr">
<head>
    <title>GaleteZen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-pastel">
    <?php
    session_start();
    require_once __DIR__ . '/controleurs/UserController.php';
    require_once __DIR__ . '/controleurs/AccountController.php';

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
