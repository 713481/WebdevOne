<?php
    require_once(__DIR__ . '/../controllers/ContactController.php');
    Route::add('/contact', function () {
        $controller = new ContactController();
        $controller->show();
    });
    