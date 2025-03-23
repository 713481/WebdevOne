<?php

require_once(__DIR__ . "/../models/MenuModel.php");

// About Page
Route::add('/about', function () {
    require_once(__DIR__ . "/../views/pages/about.php");
});

// Menu Page
Route::add('/menu', function () {
    $menuModel = new MenuModel();
    $menu = $menuModel->getGroupedMenuItems(); // Fetch menu data grouped by category

    // Pass the $menu variable to the menu page
    require_once(__DIR__ . "/../views/pages/menu.php");
});