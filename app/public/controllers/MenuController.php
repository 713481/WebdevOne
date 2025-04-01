<?php

require_once(__DIR__ . '/../models/MenuModel.php');

class MenuController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $filename = uniqid() . '-' . basename($_FILES['image']['name']);
                $targetPath = __DIR__ . '/../assets/img/menu/' . $filename;
    
                if (!is_dir(dirname($targetPath))) {
                    mkdir(dirname($targetPath), 0777, true);
                }
    
                move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
                $_POST['image_url'] = '/assets/img/menu/' . $filename;
            } else {
                $_POST['image_url'] = '';
            }
    
            $model = new MenuModel();
            $model->create($_POST);
            header("Location: /admin/menu");
            exit();
        }
    
        require(__DIR__ . '/../views/pages/add_menu_item.php');
    }
    

    public function edit($id)
    {
        $model = new MenuModel();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle file upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $filename = uniqid() . '-' . basename($_FILES['image']['name']);
                $targetPath = __DIR__ . '/../assets/img/menu/' . $filename;
    
                // Make sure the directory exists
                if (!is_dir(dirname($targetPath))) {
                    mkdir(dirname($targetPath), 0777, true);
                }
    
                move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
                $_POST['image_url'] = '/assets/img/menu/' . $filename;
            }
    
            // Update menu item
            $model->updateMenuItem($id, $_POST);
            header("Location: /admin/menu");
            exit();
        }
    
        $menuItem = $model->getMenuItemById($id);
    
        if (!$menuItem) {
            echo "Menu item not found.";
            return;
        }
    
        require(__DIR__ . '/../views/pages/edit_menu_item.php');
    }
     

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new MenuModel();
            $model->deleteMenuItem($id);
            header("Location: /admin/menu");
            exit();
        }
    }

    public function adminMenuDashboard()
    {
        $model = new MenuModel();
        $menuItems = $model->getAllMenuItems();
        require(__DIR__ . '/../views/pages/admin_menu_dashboard.php');
    }

    public function saveHighlights()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ids = [$_POST['highlight_1'], $_POST['highlight_2'], $_POST['highlight_3']];
            $model = new MenuModel();
            $model->updateHighlights($ids);
            header("Location: /admin/menu");
            exit();
        }
    }
}
