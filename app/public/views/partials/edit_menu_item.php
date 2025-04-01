<div class="container mt-5" style="max-width: 800px;">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Edit Menu Item</h2>
            <form method="POST" enctype="multipart/form-data" action="/menu/edit/<?= $menuItem['id'] ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($menuItem['name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select" required>
                        <?php
                        $categories = ['Starters', 'Main Dishes', 'Desserts', 'Drinks'];
                        foreach ($categories as $cat):
                        ?>
                            <option value="<?= $cat ?>" <?= $menuItem['category'] === $cat ? 'selected' : '' ?>>
                                <?= $cat ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"><?= htmlspecialchars($menuItem['description']) ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Price (€)</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01" value="<?= $menuItem['price'] ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="discount_price" class="form-label">Discount Price (€)</label>
                        <input type="number" name="discount_price" id="discount_price" class="form-control" step="0.01" value="<?= $menuItem['discount_price'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="allergens" class="form-label">Allergens</label>
                    <input type="text" name="allergens" id="allergens" class="form-control" value="<?= htmlspecialchars($menuItem['allergens']) ?>">
                </div>

                <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="text-end">
                    <a href="/admin/menu" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
