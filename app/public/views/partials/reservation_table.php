<?php if (!empty($reservations)): ?>
    <table class="table table-bordered table-striped">
        <thead class="<?= $striped ? 'table-secondary' : 'table-dark' ?>">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Special Request</th>
                <th>Created At</th>
                <?php if ($show_actions): ?>
                    <th>Action</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $res): ?>
                <tr>
                    <td><?= htmlspecialchars($res['reservation_date']) ?></td>
                    <td><?= htmlspecialchars(substr($res['reservation_time'], 0, 5)) ?></td>
                    <td><?= htmlspecialchars($res['num_guests']) ?></td>
                    <td><?= htmlspecialchars(ucfirst($res['status'])) ?></td>
                    <td><?= htmlspecialchars($res['special_request'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($res['created_at']) ?></td>
                    <?php if ($show_actions): ?>
                        <td>
                            <?php if ($res['status'] !== 'confirmed' && $res['status'] !== 'cancelled'): ?>
                                <a href="/cancel-reservation/<?= $res['reservation_id'] ?>" 
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Are you sure you want to cancel this reservation?');">
                                   Cancel
                                </a>
                            <?php else: ?>
                                <span class="text-muted"><?= ucfirst($res['status']) ?></span>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No reservations to show.</p>
<?php endif; ?>
