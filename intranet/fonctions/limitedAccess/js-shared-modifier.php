<?php
require_once("./../file-manager/repo-file.php");
function addMemberOfShared($typeANDuid,$elementUID){
    $files = loadJson("./../../database/files.json");
    if(isset($files['shared']['access']) && isset($files['shared']['access'][$typeANDuid])){
        return $files[$elementUID]['share']['access']; 
    }
    if (strpos($typeANDuid, 'user-') === 0) {
        $users = loadJson("./../../database/user.json");
        $uid = str_replace('user-', '', $typeANDuid);
        if(isset($users[$uid])){
            $selected = $typeANDuid;
        }else{
            return false;
        }
    }elseif (strpos($typeANDuid, 'role-') === 0) {
        $roles = loadJson("./../../database/role.json");
        $uid = str_replace('role-', '', $typeANDuid);
        if(isset($roles[$uid])){
            $selected = $typeANDuid;
        }else{
            return false;
        }
    }else{
        return false;
    }
    $files[$elementUID]['share']['type'] = 'shared';
    $files[$elementUID]['share']['access'][$selected] = array();
    saveJson("./../../database/files.json", $files);
    return $files[$elementUID]['share']['access'];
}

function removeMemberOfShared($typeANDuid,$elementUID){
    $files = loadJson("./../../database/files.json");
    if(isset($files[$elementUID]['share']['access'][$typeANDuid])){
        unset($files[$elementUID]['share']['access'][$typeANDuid]);
    }
    $files[$elementUID]['share']['type'] = 'shared';
    saveJson("./../../database/files.json", $files);
    return $files[$elementUID]['share']['access'];
}
function editMemberOfShared($typeANDuid,$permName,$newState,$elementUID){
    $files = loadJson("./../../database/files.json");
    if(isset($files[$elementUID]['share']['access'][$typeANDuid])){
        if($newState){
            $files[$elementUID]['share']['access'][$typeANDuid][] = $permName;
        }else{
            $index = array_search($permName, $files[$elementUID]['share']['access'][$typeANDuid]);
            unset($files[$elementUID]['share']['access'][$typeANDuid][$index]);
        }
    }
    $files[$elementUID]['share']['type'] = 'shared';
    saveJson("./../../database/files.json", $files);
    return $files[$elementUID]['share']['access'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' || true){
    $json = file_get_contents('php://input');
    // $json = '{"action": "add", "typeANDuid": "user-ghi789", "element": "665972dbb8869"}';
    $data = json_decode($json, true);
    if (isset($data['action']) && $data['action'] === "add" && isset($data['typeANDuid']) && isset($data['element'])){
        $newData = addMemberOfShared($data['typeANDuid'], $data['element']);
        echo json_encode($newData);
    }elseif(isset($data['action']) && $data['action'] === "remove" && isset($data['typeANDuid']) && isset($data['element'])){
        $newData = removeMemberOfShared($data['typeANDuid'], $data['element']);
        echo json_encode($newData);
    }elseif(isset($data['action']) && $data['action'] === "edit" && isset($data['typeANDuid']) && isset($data['permName']) && isset($data['newState']) && isset($data['element'])){
        $newData = editMemberOfShared($data['typeANDuid'], $data['permName'], $data['newState'], $data['element']);
        echo json_encode($newData);
    }else{
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}