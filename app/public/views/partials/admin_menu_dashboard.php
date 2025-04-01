<div class="container mt-5">
    <h2>Menu Management</h2>
    <a href="/menu/add" class="btn btn-primary mb-3">Add New Menu Item</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Allergens</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($menuItems as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['category']) ?></td>
                <td>€<?= number_format($item['price'], 2) ?></td>
                <td>
                    <?= $item['discount_price'] ? '€' . number_format($item['discount_price'], 2) : '-' ?>
                </td>
                <td><?= htmlspecialchars($item['allergens']) ?></td>
                <td>
                    <a href="/menu/edit/<?= $item['id'] ?>" class="btn btn-sm btn-outline-primary ms-1">Edit</a>
                    <form action="/menu/delete/<?= $item['id'] ?>" method="POST" style="display:inline;">
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
