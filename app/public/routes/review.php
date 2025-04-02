<?php
    require_once(__DIR__ . '/../controllers/ReviewController.php');
    // Show reviews and form
    Route::add('/review', function () {
        $controller = new ReviewController();
        $controller->show();
    });

    Route::add('/submit-review', function () {
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new ReviewController();
            $controller->submitReview();
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }, 'POST');
    


    Route::add('/get-reviews', function () {
        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->getReviews(); // Fetch all reviews from the database
    
        echo json_encode($reviews); // Send the reviews as JSON
    });
    

