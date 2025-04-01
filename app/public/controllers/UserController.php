<?php

require_once(__DIR__ . "/../models/UserModel.php");

class UserController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getAll()
    {
        return $this->userModel->getAll();
    }

    public function get($id)
    {
        return $this->userModel->get($id);
    }

    public function register($email, $username, $password, $full_name = null, $phone_number = null)
    {
        echo "Inside controller register()<br>";
        return $this->userModel->add($email, $username, $password, $full_name, $phone_number);
    }
    

    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
    
            $user = UserModel::authenticate($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: /dashboard');
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        }
    
        require_once(__DIR__ . '/../views/pages/login.php');
    }    
}
