<?php

require_once(__DIR__ . "/../controllers/UserController.php");

// Show the form (GET request)
Route::add('/register', function () {
    $error = '';
    $success = false;
    require_once(__DIR__ . "/../views/pages/register.php");
}, 'GET');

// Handle form submission (POST request)
Route::add('/register', function () {
    $error = '';
    $success = false;

    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $full_name = $_POST['full_name'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';

    $userController = new UserController();
    $registered = $userController->register($email, $username, $password, $full_name, $phone_number);

    if ($registered === true) {
        $success = true;
    } else {
        $error = $registered;
    }

    require_once(__DIR__ . "/../views/pages/register.php");
}, 'POST');