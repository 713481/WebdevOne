<?php
require_once(__DIR__ . '/../models/MessageModel.php');

class MessageController
{
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new MessageModel();
            $model->save($_POST);
            header("Location: /contact?success=1");
            exit();
        }
    }

    public function index()
    {
        $model = new MessageModel();
        $messages = $model->getAll();
        require(__DIR__ . '/../views/pages/admin_messages.php');
    }

    public function delete($id)
    {
        $model = new MessageModel();
        $model->delete($id);
        header("Location: /admin/messages");
        exit();
    }
}
