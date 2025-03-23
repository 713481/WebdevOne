<?php

require_once(__DIR__ . "/BaseModel.php");

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all users from the database
     * @return array
     */
    public function getAll()
    {
        $stmt = self::$pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Get a single user by ID
     * @param int $id
     * @return array|null
     */
    public function get($id)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Add a new user to the database
     * @param string $email
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function add($email, $username, $password)
    {
        $stmt = self::$pdo->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");
        return $stmt->execute([
            ':email' => $email,
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_BCRYPT) // Hash the password securely
        ]);
    }

    /**
     * Update user details by ID
     * @param int $id
     * @param string $email
     * @param string $username
     * @return bool
     */
    public function update($id, $email, $username)
    {
        $stmt = self::$pdo->prepare("UPDATE users SET email = :email, username = :username WHERE id = :id");
        return $stmt->execute([
            ':id' => $id,
            ':email' => $email,
            ':username' => $username
        ]);
    }

    /**
     * Delete a user by ID
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $stmt = self::$pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public static function authenticate($username, $password) {
        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Check if user exists and verify password
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user details if authentication is successful
        }
        return false; // Authentication failed
    }
}
