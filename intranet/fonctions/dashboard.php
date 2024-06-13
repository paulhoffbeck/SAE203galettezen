<?php
function compareToSortByName($a, $b) {
    $result = strcmp($a['nom'], $b['nom']);
    if ($result === 0) {
        return strcmp($a['prenom'], $b['prenom']);
    }
    return $result;
}
function compareToSortByLastActivity($a, $b) {
    return $b['last_activity'] <=> $a['last_activity'];
}


function lastUserActivity(){
    $data = json_decode(file_get_contents('./database/user.json'), true);
    $data = array_filter($data, function($user) {
        return isset($user['last_activity']); 
    });
    uasort($data, 'compareToSortByLastActivity');
    $now = time();

    $interface = "<ol class=\"list-group\">";
    foreach($data as $uid => $user){
        $lastActivity = $user['last_activity'];
        $diffInMinutes = round(($now - $lastActivity) / 60);
        if ($diffInMinutes <= 15) {
            if ($diffInMinutes == 0) {
                $timeAgo = "Maintenant";
            } elseif ($diffInMinutes == 1) {
                $timeAgo = "Il y a 1 minute";
            } else {
                $timeAgo = "Il y a $diffInMinutes minutes";
            }
            $interface .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">
                <div class=\"ms-2 me-auto\">
                    <div class=\"fw-bold\">{$user['prenom']} {$user['nom']}</div>
                    <small>$timeAgo</small>
                </div>
                <span class=\"badge bg-success rounded-pill\">En ligne</span>
            </li>";
        }
    }
    $interface .= "</ol>";
    return $interface;
} ?>