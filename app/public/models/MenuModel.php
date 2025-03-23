<?php

require_once(__DIR__ . "/BaseModel.php");

class MenuModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all menu items from the database
     * @return array
     */
    public function getAllMenuItems()
    {
        $stmt = self::$pdo->prepare("SELECT * FROM menu_items ORDER BY category, name");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Get a single menu item by ID
     * @param int $id
     * @return array|null
     */
    public function getMenuItemById($id)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM menu_items WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getGroupedMenuItems()
    {
    $stmt = self::$pdo->prepare("SELECT * FROM menu_items ORDER BY category, name");
    $stmt->execute();
    $menuItems = $stmt->fetchAll();

    // Group items by category
    $menu = [];
    foreach ($menuItems as $item) {
        $menu[$item['category']][] = $item;
    }
    return $menu;
    }
}
