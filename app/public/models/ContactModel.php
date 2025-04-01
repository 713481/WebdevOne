<?php
require_once(__DIR__ . "/BaseModel.php");

class ContactModel extends BaseModel
{
    public function getAll()
    {
        $stmt = self::$pdo->prepare("SELECT type, label, value FROM contact_info ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
