<div class="container mt-5">
    <h2>Edit Reservation #<?= htmlspecialchars($reservation['reservation_id']) ?></h2>
    <form method="POST" action="/update-reservation">
        <input type="hidden" name="reservation_id" value="<?= $reservation['reservation_id'] ?>">

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="reservation_date" class="form-control"
                   value="<?= htmlspecialchars($reservation['reservation_date']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Time</label>
            <input type="time" name="reservation_time" class="form-control"
                   value="<?= htmlspecialchars($reservation['reservation_time']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Guests</label>
            <input type="number" name="num_guests" class="form-control"
                   value="<?= htmlspecialchars($reservation['num_guests']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <?php foreach (['pending', 'confirmed', 'cancelled'] as $status): ?>
                    <option value="<?= $status ?>" <?= $reservation['status'] === $status ? 'selected' : '' ?>>
                        <?= ucfirst($status) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Special Request</label>
            <textarea name="special_request" class="form-control"><?= htmlspecialchars($reservation['special_request']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Table</label>
            <select name="table_id" class="form-select">
                <option value="">Not assigned</option>
                <?php foreach ($tables as $table): ?>
                    <option value="<?= $table['table_id'] ?>" <?= $table['table_id'] == $reservation['table_id'] ? 'selected' : '' ?>>
                        Table <?= $table['table_number'] ?> - <?= $table['capacity'] ?> people (<?= $table['location'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="/admin" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
