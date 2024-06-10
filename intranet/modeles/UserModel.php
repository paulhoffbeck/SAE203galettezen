<?php
class UserModel {
    private $file = __DIR__ . './../database/user.json';
    public function getUsers() {
        $jsonData = file_get_contents($this->file);
        return json_decode($jsonData, true);
    }
    public function getUserByEmail($email) {
        $jsonData = file_get_contents($this->file);
        $data = json_decode($jsonData, true);
        foreach ($data as $uid => $user){
            if($email === $user['email']){
                $user['uid'] = $uid;
                return $user;
            }
        }
    }
}
?>