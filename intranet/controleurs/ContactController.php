<?php
require_once __DIR__ . '/../modeles/ContactModel.php';
require_once __DIR__ . '/../vues/ContactView.php';

class ContactController {
    private $contactModel;
    private $view;

    public function __construct() {
        $this->contactModel = new ContactModel();
        $this->view = new ContactView();
    }

    public function deleteContact() {
        $contact = $this->contactModel->getContacts();
        if (isset($_POST['supprimer_contact']) && isset($_POST['contact_id'])) {
            $contactId = $_POST['contact_id'];
            if ($this->contactModel->deleteContact($contactId)) {
                header("Location: index.php?page=contact");
                exit;
            }
        }
    }

    public function interface() {
        $this->deleteContact();
        $contact = $this->contactModel->getContacts();
        $this->view->CardBord($contact);
    }
}
?>
