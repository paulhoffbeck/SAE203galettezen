<?php
class LoginView {
    public function formulaire($notification = "",$inputEmail = "") {
        $formTemplate = file_get_contents(__DIR__ . '/../templates/Login/login_form.html');
        if(!empty($notification)){
            $notification = "<div class=\"alert alert-warning\">$notification</div>";
        }
        $output = str_replace(['__NOTIFICATION__','__INPUT_EMAIL__'],[$notification,$inputEmail],$formTemplate);
        echo $output;
    }
}
?>
