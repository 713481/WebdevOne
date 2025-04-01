<div class="mb-3">
    <label for="name" class="form-label">Dish Name</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?= htmlspecialchars($item['name'] ?? '') ?>">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($item['description'] ?? '') ?></textarea>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price (€)</label>
    <input type="number" class="form-control" id="price" name="price" step="0.01" required value="<?= htmlspecialchars($item['price'] ?? '') ?>">
</div>

<div class="mb-3">
    <label for="discount_price" class="form-label">Discount Price (€)</label>
    <input type="number" class="form-control" id="discount_price" name="discount_price" step="0.01" value="<?= htmlspecialchars($item['discount_price'] ?? '') ?>">
</div>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <input type="text" class="form-control" id="category" name="category" required value="<?= htmlspecialchars($item['category'] ?? '') ?>">
</div>

<div class="mb-3">
    <label for="image_url" class="form-label">Image URL</label>
    <input type="url" class="form-control" id="image_url" name="image_url" value="<?= htmlspecialchars($item['image_url'] ?? '') ?>">
</div>

<div class="mb-3">
    <label for="allergens" class="form-label">Allergens</label>
    <input type="text" class="form-control" id="allergens" name="allergens" value="<?= htmlspecialchars($item['allergens'] ?? '') ?>">
</div>
