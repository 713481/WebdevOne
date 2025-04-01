<?php
    require_once(__DIR__ . '/../models/MenuModel.php');

    Route::add('/api/highlights', function () {
        header('Content-Type: application/json');
        $model = new MenuModel();
        $items = $model->getHighlightedItems();
        echo json_encode($items);
    });
