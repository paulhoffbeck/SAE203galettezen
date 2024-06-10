<?php
class UserView {
    public function render($users) {
        $tableTemplate = file_get_contents(__DIR__ . '/../templates/User/user_table.html');
        $rowTemplate = file_get_contents(__DIR__ . '/../templates/User/user_row.html');
        
        $rowsHtml = '';
        foreach ($users as $uid => $user) {
            if (isset($user['role_uid']) && !empty($user['role_uid'])) {
                $row = str_replace(
                    ['__PPURL__', '__PRENOM__', '__NOM__', '__ROLE_NAME__', '__POSTE__', '__EMAIL__', '__TELEPHONE__'],
                    [$user['ppurl'], $user['prenom'], $user['nom'], $user['role_name'], $user['poste'], $user['email'], $user['telephone']],
                    $rowTemplate
                );
                $rowsHtml .= $row;
            }
        }
        $output = str_replace('__USER_ROWS__', $rowsHtml, $tableTemplate);
        echo $output;
    }
}
?>
