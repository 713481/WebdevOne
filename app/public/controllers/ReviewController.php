<?php

require_once(__DIR__ . '/../models/ReviewModel.php');

class ReviewController
{
    public function show()
    {
        // Create an instance of ReviewModel
        $model = new ReviewModel();

        // Fetch reviews from the database
        $reviews = $model->getReviews();

        // Display the reviews page
        require(__DIR__ . '/../views/pages/review_page.php');
    }

    public function submitReview() {
        // Ensure the user is logged in
        if (!isset($_SESSION['user'])) {
            header('Content-Type: application/json'); // Make sure the header is set to JSON
            echo json_encode(['success' => false, 'message' => 'You must be logged in to submit a review.']);
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $userId = $_SESSION['user']['id'];
    
            // Insert into database
            $model = new ReviewModel();
            $success = $model->insertReview($name, $email, $message, $userId);
    
            // Set the response header to application/json
            header('Content-Type: application/json'); // Ensure response is JSON
    
            // Send back JSON response
            if ($success) {
                echo json_encode(['success' => true, 'message' => 'Review submitted successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error submitting review.']);
            }
        }
    }    
    
    // Get reviews in JSON format for AJAX
    public function getReviews()
    {
        $model = new ReviewModel();
        $reviews = $model->getReviews();
        echo json_encode($reviews);
    }
}
