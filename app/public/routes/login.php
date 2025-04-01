<?php
    Route::add('/login', function () {
        $controller = new UserController();
        $controller->login();
    }, 'GET');

    Route::add('/login', function () {
        $controller = new UserController();
        $controller->login();
    }, 'POST');

    // ✅ Dashboard Page
    Route::add('/dashboard', function () {
        require_once(__DIR__ . "/../views/pages/dashboard.php");
    });
    
    Route::add('/logout', function () {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        session_unset();      // Remove all session variables
        session_destroy();    // Destroy the session
    
        // Optional: redirect to homepage or login
        header("Location: /");
        exit();
    }, 'GET');
    
