<?php
require_once(__DIR__ . "/BaseModel.php");

class MessageModel extends BaseModel
{
    public function save($data)
    {
        $stmt = self::$pdo->prepare("
            INSERT INTO messages (name, email, message)
            VALUES (:name, :email, :message)
        ");
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':message' => $data['message'],
        ]);
    }

    public function getAll()
    {
        $stmt = self::$pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $stmt = self::$pdo->prepare("DELETE FROM messages WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
