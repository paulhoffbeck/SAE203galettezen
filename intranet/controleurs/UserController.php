<?php
require_once __DIR__ . '/../modeles/UserModel.php';
require_once __DIR__ . '/../modeles/RoleModel.php';
require_once __DIR__ . '/../vues/UserView.php';

class UserController {
    private $userModel;
    private $roleModel;
    private $view;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->view = new UserView();
    }

    public function listUsers() {
        $users = $this->userModel->getUsers();
        foreach ($users as $key => $user) {
            // Assign role name
            $users[$key]['role_name'] = $this->roleModel->getRoleNameByID($user['role_uid'] ?? '');

            // Assign profile picture URL
            $users[$key]['ppurl'] = $this->getProfilePictureUrl($key);
        }
        $this->view->render($users);
    }

    private function getProfilePictureUrl($userId) {
        $imgPath = __DIR__ . "/../img/collaborateur/{$userId}.png";
        return file_exists($imgPath) ? "./img/collaborateur/{$userId}.png" : "./img/collaborateur/pasdepp.png";
    }
}
?>
