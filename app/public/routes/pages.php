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
    $discounted = $menuModel->getDiscountedItems(); // Fetch discounted items

    // Pass both the menu and discounted items to the view
    require_once(__DIR__ . "/../views/pages/menu.php");
});
