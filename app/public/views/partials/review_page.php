<div class="container mt-5">
    <h1 class="text-center">Customer Reviews</h1>
    
    <!-- Reviews Section -->
    <div id="reviewsSection">
        <!-- Existing reviews will be displayed here -->
    </div>

    <!-- Review Form -->
    <h2 class="text-center">Leave a Review</h2>
    <form id="reviewForm">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Review</label>
            <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>

