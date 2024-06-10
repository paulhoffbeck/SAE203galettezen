<?php
class ContactModel {
    private $file = './database/contactlist.json';

    public function getContacts() {
        $jsonData = file_get_contents($this->file);
        return json_decode($jsonData, true);
    }

    public function deleteContact($contactId) {
        $contacts = $this->getContacts();
        if (isset($contacts[$contactId])) {
            unset($contacts[$contactId]);
            file_put_contents($this->file, json_encode($contacts, JSON_PRETTY_PRINT));
            return true;
        }
        return false;
    }
}
?>
