<?php
require_once(__DIR__ . '/../models/ContactModel.php');

class ContactController
{
    public function show()
    {
        $model = new ContactModel();
        $contactInfo = $model->getAll();
        require(__DIR__ . '/../views/pages/contact.php');
    }
}
