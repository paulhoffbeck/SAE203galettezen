<?php
require_once __DIR__ . '/../modeles/UserModel.php';
require_once __DIR__ . '/../modeles/RoleModel.php';
require_once __DIR__ . '/../vues/LoginView.php';

class AccountController {
    private $userModel;
    private $roleModel;
    private $view;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->view = new LoginView();
    }

    public function logger() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
            $user = $this->userModel->getUserByEmail($_POST['email']);
            if ($user) {
                if(empty($user['role_uid'])){
                    $error = 'Vous n\'êtes pas en droit de vous connecter.';
                    $this->view->formulaire($error);
                    return;
                }
                if(password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])){
                    $_SESSION['uid'] = $user['uid'];
                    $_SESSION['nom'] = $user['nom'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['telephone'] = $user['telephone'];
                    $_SESSION['poste'] = $user['poste'];
                    $_SESSION['role_uid'] = $user['role_uid'];
                    header('Location: index.php?page=index');
                    exit();
                }else{
                    $error = 'Le mot de passe est incorrect.';
                    $this->view->formulaire($error);
                    return;
                }
            } else {
                $error = 'Les informations de connexion ne sont pas corrects.';
                $this->view->formulaire($error,$_POST['email']);
                return;
            }
        }
        
        $this->view->formulaire();
    }
}
?>
