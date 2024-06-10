<?php
class RoleModel {
    private $file = __DIR__ . '/../database/role.json';
    private $roles;
    public function __construct() {
        $this->roles = json_decode(file_get_contents($this->file), true);
    }
    public function getRoles() {
        return $this->roles;
    }
    public function getRoleNameByID($uid) {
        return isset($this->roles[$uid]) ? $this->roles[$uid]['name'] : 'Sans Rôle';
    }
    public function getRolePermissionsByID($uid) {
        return isset($this->roles[$uid]) ? $this->roles[$uid]['permissions'] : [];
    }
}
?>
