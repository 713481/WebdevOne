<?php
    require_once(__DIR__ . '/../controllers/AdminController.php');
    require_once(__DIR__ . '/../controllers/MenuController.php');
    require_once(__DIR__ . '/../controllers/MessageController.php');

    Route::add('/admin', function () {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
    
        $controller = new AdminController();
        $controller->dashboard();
    });
    
    Route::add('/assign-table', function () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'], $_POST['table_id'])) {
            $reservation_id = intval($_POST['reservation_id']);
            $table_id = intval($_POST['table_id']);
    
            $controller = new AdminController();
            $controller->assignTable($reservation_id, $table_id);
    
            header("Location: /admin");
            exit();
        }
    }, 'POST');
    
    // Delete
    Route::add('/delete-reservation', function () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'])) {
            $id = intval($_POST['reservation_id']);

            $model = new ReservationModel();
            $model->delete($id);

            header("Location: /admin");
            exit();
        }
    }, 'POST');

    // Edit
    Route::add('/edit-reservation/([0-9]+)', function ($id) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
    
        $model = new ReservationModel();
        $reservation = $model->getById($id);
        $tables = $model->getAllTables();
    
        require_once(__DIR__ . '/../views/pages/edit_reservation.php');
    });
    
    Route::add('/update-reservation', function () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new ReservationModel();
            $model->update($_POST);
    
            header("Location: /admin");
            exit();
        }
    }, 'POST');
    
    // Add user
    Route::add('/add-user', function () {
        require_once(__DIR__ . '/../controllers/AdminController.php');
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $controller = new AdminController();
                $controller->addUser($_POST);
    
                header("Location: /admin");
                exit();
            } catch (Exception $e) {
                die("Error adding user: " . $e->getMessage());
            }
        } else {
            require_once(__DIR__ . '/../views/pages/add_user.php');
        }
    }, ['GET', 'POST']);
    
    // Edit user
    Route::add('/edit-user/([0-9]+)', function ($id) {
        $controller = new AdminController();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateUser($id, $_POST);
            header("Location: /admin");
            exit();
        } else {
            $user = $controller->getUserById($id);
            require_once(__DIR__ . '/../views/pages/edit_user.php');
        }
    }, ['GET', 'POST']);
    
    // Delete user
    Route::add('/delete-user/([0-9]+)', function ($id) {
        $controller = new AdminController();
        $controller->deleteUser($id);
        header("Location: /admin");
        exit();
    });
    
    //--------------------------------------------- MENU ---------------------------------------------//
    // Menu Dashboard (list)
    Route::add('/admin/menu', function () {
        $controller = new MenuController();
        $controller->adminMenuDashboard();
    });

    // Add Menu Item (form + submit)
    Route::add('/menu/add', function () {
        $controller = new MenuController();
        $controller->add();
    }, ['GET', 'POST']);

    // Edit Menu Item
    Route::add('/menu/edit/([0-9]+)', function ($id) {
        $controller = new MenuController();
        $controller->edit($id);
    }, ['GET', 'POST']);
 

    // Delete Menu Item
    Route::add('/menu/delete/([0-9]+)', function ($id) {
        $controller = new MenuController();
        $controller->delete($id);
    }, 'POST');

      //--------------------------------------------- MESSAGES ---------------------------------------------//
    Route::add('/contact/message', function () {
        $controller = new MessageController();
        $controller->store();
    }, 'POST');

    Route::add('/admin/messages', function () {
        $controller = new MessageController();
        $controller->index();
    });

    Route::add('/admin/messages/delete/([0-9]+)', function ($id) {
        $controller = new MessageController();
        $controller->delete($id);
    }, 'POST');

      //--------------------------------------------- DISHES FRONT PAGE ---------------------------------------------//
    Route::add('/admin/menu/highlights', function () {
        $controller = new MenuController();
        $controller->highlightForm();
    });
    
    Route::add('/admin/menu/highlights/save', function () {
        $controller = new MenuController();
        $controller->saveHighlights();
    }, 'POST');
    
