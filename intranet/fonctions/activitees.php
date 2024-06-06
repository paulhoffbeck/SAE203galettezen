<?php
function insertActivity($user,$message,$level = 1){
    $data = loadJson("./database/activitees.json");
    $time = time();
    $data[$time] = array(
        "user" => $user,
        "message" => $message,
        "level" => $level
    );
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('./database/activitees.json', $jsonData);
}

function afficheTableActivities($nombre = 25){
    $datas = loadJson("./database/activitees.json");
    $datas = array_reverse($datas, true);
    foreach($datas as $time => $data){
        if(file_exists('./img/collaborateur/'. $data['user'] .'.png')){
            $image = "./img/collaborateur/{$data['user']}.png";
        }else{
            $image = "./img/collaborateur/pasdepp.png";
        }
        if($data['level'] == 3 && hasPermission("admin","activity-level-danger")){
            echo "<tr><td><span class=\"badge d-flex align-items-center p-1 pe-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-pill\">
                <img class=\"rounded-circle me-1\" width=\"24\" height=\"24\" src=\"$image\" alt=\"\">".getUserNameByUid($data['user'])."</span></td><td><small>[".date('d/m/Y H:i:s', $time)."] - {$data['message']}</small></td></tr>";
        }elseif($data['level'] == 2 && hasPermission("admin","activity-level-warning")){
            echo "<tr><td><span class=\"badge d-flex align-items-center p-1 pe-2 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-pill\">
                <img class=\"rounded-circle me-1\" width=\"24\" height=\"24\" src=\"$image\" alt=\"\">".getUserNameByUid($data['user'])."</span></td><td><small>[".date('d/m/Y H:i:s', $time)."] - {$data['message']}</small></td></tr>";
        }elseif($data['level'] == 1){
            echo "<tr><td><span class=\"badge d-flex align-items-center p-1 pe-2 text-dark-emphasis bg-light-subtle border border-dark-subtle rounded-pill\">
                <img class=\"rounded-circle me-1\" width=\"24\" height=\"24\" src=\"$image\" alt=\"\">".getUserNameByUid($data['user'])."</span></td><td><small>[".date('d/m/Y H:i:s', $time)."] - {$data['message']}</small></td></tr>";
        }
    }
}
?>