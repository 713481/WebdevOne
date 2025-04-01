<div class="container mt-5" style="max-width: 600px;">
    <h2 class="text-center mb-4">Book a Table</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success">Reservation successfully submitted!</div>
    <?php endif; ?>

    <form method="POST" action="/reservation" class="border p-4 rounded bg-light shadow-sm">
        <div class="mb-3">
            <label for="reservation_date" class="form-label">Date</label>
            <input type="date" name="reservation_date" id="reservation_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="reservation_time" class="form-label">Time</label>
            <input type="time" name="reservation_time" id="reservation_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="num_guests" class="form-label">Number of Guests</label>
            <input type="number" name="num_guests" id="num_guests" class="form-control" min="1" max="20" required>
        </div>

        <div class="mb-3">
            <label for="special_request" class="form-label">Special Requests (optional)</label>
            <textarea name="special_request" id="special_request" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit Reservation</button>
    </form>
</div>