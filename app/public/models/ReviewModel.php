<?php

class ReviewModel extends BaseModel
{
    // Insert a review into the database
    public function insertReview($name, $email, $message, $userId)
    {
        // Add user_id to the insert statement
        $stmt = self::$pdo->prepare("INSERT INTO reviews (name, email, message, user_id, created_at) VALUES (:name, :email, :message, :user_id, NOW())");

        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message,
            ':user_id' => $userId,
        ]);
    }
    
    
    // Fetch all reviews
    public function getReviews()
    {
        $stmt = self::$pdo->prepare("SELECT id, name, message, created_at FROM reviews ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Fetch reviews by specific user
    public function getReviewsByUserId($user_id)
    {
        $stmt = self::$pdo->prepare("SELECT id, name, message, created_at FROM reviews WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    // Delete a review
    public function deleteReview($id)
    {
        $stmt = self::$pdo->prepare("DELETE FROM reviews WHERE id = ?");
        $stmt->execute([$id]);
    }
}
