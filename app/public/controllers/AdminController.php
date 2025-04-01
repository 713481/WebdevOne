<?php

require_once(__DIR__ . "/../models/ReservationModel.php");
require_once(__DIR__ . "/../models/UserModel.php");

class AdminController
{
    public function dashboard()
    {
        $reservationModel = new ReservationModel();
        $userModel = new UserModel();
        $messageModel = new MessageModel();
        $menuModel = new MenuModel();
    
        $filter = $_GET['filter'] ?? 'active';
        $reservations = $this->getFilteredReservations($filter);
        $allUsers = $userModel->getAll();
        $allTables = $reservationModel->getAllTables();
        $allMessages = $messageModel->getAll();
    
        $items = $menuModel->getAllMenuItemsFlat();
        $highlighted = $menuModel->getHighlightedItems();
    
        require(__DIR__ . '/../views/pages/admin_dashboard.php');
    }
    
     
    public function getFilteredReservations($filter) {
        $model = new ReservationModel();
    
        switch ($filter) {
            case 'cancelled':
                return $model->getByStatus('cancelled');
            case 'all':
                return $model->getAll(); // everything
            default: // 'active'
                return $model->getAll(['pending', 'confirmed']);
        }
    }

    public function getAllUsers() {
        require_once(__DIR__ . '/../models/UserModel.php');
        $userModel = new UserModel();
        return $userModel->getAll();
    }

    public function assignTable($reservation_id, $table_id) {
        $model = new ReservationModel();
        $model->assignTable($reservation_id, $table_id);
    }
    
    public function addUser($data) {
        require_once(__DIR__ . '/../models/UserModel.php');
        $userModel = new UserModel();
    
        $userModel->create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'role' => $data['role'],
        ]);
    }
    
    public function getUserById($id) {
        $model = new UserModel();
        return $model->get($id);
    }
    
    public function updateUser($id, $data) {
        $model = new UserModel();
        $model->updateFull($id, $data['full_name'], $data['email'], $data['username'], $data['role']);
    }
    
    public function deleteUser($id) {
        $model = new UserModel();
        $model->delete($id);
    }
    
    public function menuDashboard() {
        $model = new MenuModel();
        $menuItems = $model->getAllMenuItems();
        require_once(__DIR__ . '/../views/pages/admin_menu_dashboard.php');
    }
    
    public function showAddMenuForm() {
        require_once(__DIR__ . '/../views/pages/add_menu_item.php');
    }
    
    public function addMenuItem($data) {
        $model = new MenuModel();
        $model->insertMenuItem($data);
        header("Location: /admin/menu");
        exit();
    }
    
    public function showEditMenuForm($id) {
        $model = new MenuModel();
        $item = $model->getMenuItemById($id);
        require_once(__DIR__ . '/../views/pages/edit_menu_item.php');
    }
    
    public function updateMenuItem($id, $data) {
        $model = new MenuModel();
        $model->updateMenuItem($id, $data);
        header("Location: /admin/menu");
        exit();
    }
    
    public function deleteMenuItem($id) {
        $model = new MenuModel();
        $model->deleteMenuItem($id);
    }
    
    public function highlightForm()
    {
        $model = new MenuModel();
        $items = $model->getAllMenuItemsFlat();
        $highlighted = $model->getHighlightedItems();
        require(__DIR__ . '/../views/pages/admin_highlight_form.php');
    }
}
