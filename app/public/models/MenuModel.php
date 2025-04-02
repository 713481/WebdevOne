<?php

require_once(__DIR__ . "/BaseModel.php");

class MenuModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Get all menu items from the database* @return array*/
    public function getAllMenuItems()
    {
        $stmt = self::$pdo->prepare("
            SELECT id, name, description, price, discount_price, category, image_url, allergens
            FROM menu_items
            ORDER BY category, name
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*** Get a single menu item by ID* @param int $id* @return array|null*/
    public function getMenuItemById($id)
    {
        $stmt = self::$pdo->prepare("
            SELECT id, name, description, price, discount_price, category, image_url, allergens
            FROM menu_items
            WHERE id = :id
        ");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $menuItem = $stmt->fetch();
        
        // Check if image_url exists and is not empty
        $menuItem['image_url'] = isset($menuItem['image_url']) ? $menuItem['image_url'] : 'default_image_url.jpg'; // default fallback image URL

        return $menuItem;
    }

    /*** Get menu items grouped by category* @return array*/
    public function getGroupedMenuItems()
    {
        $stmt = self::$pdo->prepare("
            SELECT id, name, description, price, discount_price, category, image_url, allergens, category_order
            FROM menu_items
            ORDER BY category_order ASC, name ASC
        ");
        $stmt->execute();
        $menuItems = $stmt->fetchAll();
    
        // Group items by category
        $menu = [];
        foreach ($menuItems as $item) {
            $menu[$item['category']][] = $item;
        }
    
        // Custom sort order
        $customOrder = ['Starters', 'Main Dishes', 'Drinks', 'Desserts'];
        uksort($menu, function ($a, $b) use ($customOrder) {
            return array_search($a, $customOrder) - array_search($b, $customOrder);
        });
    
        return $menu;
    }

    public function insertMenuItem($data) {
        $stmt = self::$pdo->prepare("
            INSERT INTO menu_items (name, description, price, discount_price, category, image_url, allergens)
            VALUES (:name, :description, :price, :discount_price, :category, :image_url, :allergens)
        ");
        $stmt->execute($data);
    }
    
    public function updateMenuItem($id, $data) {
        $data['id'] = $id;
    
        // Check if image_url is provided, if not use the existing value
        if (empty($data['image_url'])) {
            // Fetch current image_url from the database if not provided
            $currentItem = $this->getMenuItemById($id);
            $data['image_url'] = $currentItem['image_url'];
        }
    
        // Ensure discount price is handled
        $data['discount_price'] = $data['discount_price'] !== '' ? $data['discount_price'] : null;
    
        $stmt = self::$pdo->prepare("
            UPDATE menu_items SET
                name = :name,
                description = :description,
                price = :price,
                discount_price = :discount_price,
                category = :category,
                image_url = :image_url,
                allergens = :allergens
            WHERE id = :id
        ");
    
        $stmt->execute([
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':discount_price' => $data['discount_price'],
            ':category' => $data['category'],
            ':image_url' => $data['image_url'],
            ':allergens' => $data['allergens'],
            ':id' => $data['id'],
        ]);
    }
    
    
    public function deleteMenuItem($id) {
        $stmt = self::$pdo->prepare("DELETE FROM menu_items WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
    
    public function create($data) {
        $stmt = self::$pdo->prepare("
            INSERT INTO menu_items (name, description, price, discount_price, category, image_url, allergens)
            VALUES (:name, :description, :price, :discount_price, :category, :image_url, :allergens)
        ");
        $stmt->execute([
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':discount_price' => $data['discount_price'] ?: null,
            ':category' => $data['category'],
            ':image_url' => $data['image_url'],
            ':allergens' => $data['allergens'],
        ]);
    }

    public function getHighlightedItems()
    {
        $stmt = self::$pdo->prepare("
            SELECT mi.*
            FROM highlighted_items hi
            JOIN menu_items mi ON hi.menu_item_id = mi.id
            ORDER BY hi.position ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllMenuItemsFlat()
    {
        $stmt = self::$pdo->query("SELECT id, name FROM menu_items ORDER BY name");
        return $stmt->fetchAll();
    }

    public function updateHighlights($ids)
    {
        // Clear old
        self::$pdo->exec("DELETE FROM highlighted_items");

        // Insert new
        $stmt = self::$pdo->prepare("
            INSERT INTO highlighted_items (menu_item_id, position)
            VALUES (:menu_item_id, :position)
        ");

        foreach ($ids as $index => $menu_id) {
            $stmt->execute([
                ':menu_item_id' => $menu_id,
                ':position' => $index + 1
            ]);
        }
    }

    public function getDiscountedItems()
    {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM menu_items
            WHERE discount_price IS NOT NULL AND discount_price < price
            ORDER BY name ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }


}
