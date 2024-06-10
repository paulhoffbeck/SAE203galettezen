<?php
class UserView {
    private $tableTemplate;
    private $rowTemplate;
    private $filterTemplate;

    public function __construct() {
        $this->tableTemplate = file_get_contents(__DIR__ . '/../templates/User/user_table.html');
        $this->rowTemplate = file_get_contents(__DIR__ . '/../templates/User/user_row.html');
        $this->filterTemplate = file_get_contents(__DIR__ . '/../templates/User/user_filter.html');
    }
    public function render($users) {
        $filterTemplate = $this->setFilterPlaceholders();
        $filteredUsers = $this->filtreUsers($users);
        $rowsHtml = $this->generateUserRowsHtml($filteredUsers);
        $output = str_replace(['__FILTER_ROW__', '__USER_ROWS__'], [$filterTemplate, $rowsHtml], $this->tableTemplate);
        echo $output;
    }
    private function setFilterPlaceholders() {
        return str_replace(
            ['__PRENOM__', '__NOM__', '__EMAIL__', '__TELEPHONE__'],
            [$_GET['prenom'] ?? '', $_GET['nom'] ?? '', $_GET['email'] ?? '', $_GET['telephone'] ?? ''],
            $this->filterTemplate
        );
    }
    private function filtreUsers($users) {
        return array_filter($users, function($user) {
            return empty($_GET['prenom']) || $_GET['prenom'] === $user['prenom']
                && empty($_GET['nom']) || $_GET['nom'] === $user['nom']
                && empty($_GET['email']) || $_GET['email'] === $user['email']
                && empty($_GET['telephone']) || $_GET['telephone'] === $user['telephone'];
        });
    }
    private function generateUserRowsHtml($users) {
        $rowsHtml = '';
        foreach ($users as $uid => $user) {
            $row = str_replace(
                ['__PPURL__', '__PRENOM__', '__NOM__', '__ROLE_NAME__', '__POSTE__', '__EMAIL__', '__TELEPHONE__'],
                [$user['ppurl'], $user['prenom'], $user['nom'], $user['role_name'], $user['poste'], $user['email'], $user['telephone']],
                $this->rowTemplate
            );
            $rowsHtml .= $row;
        }
        return $rowsHtml;
    }
}
?>
