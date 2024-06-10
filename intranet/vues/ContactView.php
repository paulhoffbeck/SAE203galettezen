<?php
class ContactView {
    private $gridTemplate;
    private $rowTemplate;

    public function __construct() {
        $this->gridTemplate = file_get_contents(__DIR__ . '/../templates/Contact/gridCardBord.html');
        $this->rowTemplate = file_get_contents(__DIR__ . '/../templates/Contact/card.html');
    }

    public function CardBord($contact) {
        $rows = "";
        foreach ($contact as $uid => $row) {
            $rows .= str_replace(['__SUJET__', '__DATE__', '__ENVOYEUR__', '__MESSAGE__', '__EMAIL__','__CONTACT_ID__'], [$row['sujet'], $row['date'], $row['nom'], $row['message'], $row['mail'], $uid], $this->rowTemplate);
        }
        $output = str_replace('__CARDS__', $rows, $this->gridTemplate);
        echo $output;
    }
}
?>
