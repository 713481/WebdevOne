<div class="container mt-5">
    <h2>Admin Dashboard</h2>
        <div class="mb-3">
        <a href="/admin?filter=active" class="btn btn-primary <?= $filter === 'active' ? 'active' : '' ?>">Active</a>
        <a href="/admin?filter=cancelled" class="btn btn-danger <?= $filter === 'cancelled' ? 'active' : '' ?>">Cancelled</a>
        <a href="/admin?filter=all" class="btn btn-secondary <?= $filter === 'all' ? 'active' : '' ?>">All</a>
    </div>
    <h4 class="mt-4">Reservations</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Full name</th>
                <th>Table</th>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Special Request</th>
                <th>Created At</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $res): ?>
                <tr>
                    <td><?= htmlspecialchars($res['full_name']) ?></td>
                    <td>
                    <?php if (empty($res['table_id']) && $res['status'] === 'pending'): ?>
                        <form method="POST" action="/assign-table" class="d-flex align-items-center">
                            <input type="hidden" name="reservation_id" value="<?= $res['reservation_id'] ?>">
                            <select name="table_id" class="form-select form-select-sm me-2" required>
                                <?php foreach ($allTables as $table): ?>
                                    <option value="<?= $table['table_id'] ?>">
                                        Table <?= $table['table_number'] ?> - <?= $table['capacity'] ?> people - (<?= $table['location'] ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-sm btn-success">Assign</button>
                        </form>
                    <?php else: ?>
                        <?php if (!empty($res['table_id'])): ?>
                            Table <?= htmlspecialchars($res['table_id']) ?>
                        <?php else: ?>
                            <span class="text-muted">Not assigned</span>
                        <?php endif; ?>
                    <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($res['reservation_date']) ?></td>
                    <td><?= htmlspecialchars(substr($res['reservation_time'], 0, 5)) ?></td>
                    <td><?= htmlspecialchars($res['num_guests']) ?></td>
                    <td><?= htmlspecialchars($res['status']) ?></td>
                    <td><?= htmlspecialchars($res['special_request'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($res['created_at']) ?></td>
                    <td>
                        <!-- Edit -->
                        <a href="/edit-reservation/<?= $res['reservation_id'] ?>" class="btn btn-sm btn-outline-primary ms-1">
                            Edit
                        </a>
                        <!-- Delete -->
                        <form method="POST" action="/delete-reservation" style="display:inline;">
                            <input type="hidden" name="reservation_id" value="<?= $res['reservation_id'] ?>">
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <!-- DISHES HIGHLIGHTED FRONT PAGE -->
    <div class="container mt-5" style="max-width: 700px;">
        <h2 class="mb-4">Highlight Menu Items</h2>
        <form method="POST" action="/admin/menu/highlights/save">
            <?php for ($i = 1; $i <= 3; $i++): 
                $selected = $highlighted[$i - 1]['id'] ?? null;
            ?>
                <div class="mb-3">
                    <label class="form-label">Highlight <?= $i ?></label>
                    <select class="form-select" name="highlight_<?= $i ?>" required>
                        <option value="">-- Select a dish --</option>
                        <?php foreach ($items as $item): ?>
                            <option value="<?= $item['id'] ?>" <?= $item['id'] == $selected ? 'selected' : '' ?>>
                                <?= htmlspecialchars($item['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Save Highlights</button>
        </form>
    </div>


    <h4 class="mt-5">All Users</h4>
    <a href="/add-user" class="btn btn-primary mb-3">+ Add User</a>
        <ul class="list-group">
            <?php foreach ($allUsers as $user): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <?= htmlspecialchars($user['full_name']) ?> (<?= htmlspecialchars($user['email']) ?>) - Role: <?= htmlspecialchars($user['role']) ?>
                    </div>
                    <div>
                        <a href="/edit-user/<?= $user['id'] ?>" class="btn btn-sm btn-outline-primary ms-1">Edit</a>
                        <a href="/delete-user/<?= $user['id'] ?>" class="btn btn-sm btn-outline-danger"
                        onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <h4 class="mt-5">Contact Messages</h4>
            <?php if (!empty($allMessages)): ?>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Sent At</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allMessages as $msg): ?>
                            <tr>
                                <td><?= htmlspecialchars($msg['name']) ?></td>
                                <td><?= htmlspecialchars($msg['email']) ?></td>
                                <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                                <td><?= htmlspecialchars($msg['created_at']) ?></td>
                                <td>
                                    <form method="POST" action="/admin/messages/delete" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $msg['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No messages yet.</p>
            <?php endif; ?>

</div>