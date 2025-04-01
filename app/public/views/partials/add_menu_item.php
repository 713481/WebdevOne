<div class="container mt-5" style="max-width: 800px;">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Add New Menu Item</h2>
            <form method="POST" enctype="multipart/form-data" action="/menu/add">
                <!-- Form Fields -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">Select a category</option>
                        <option value="Starters">Starters</option>
                        <option value="Main Dishes">Main Dishes</option>
                        <option value="Desserts">Desserts</option>
                        <option value="Drinks">Drinks</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Price (€)</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="discount_price" class="form-label">Discount Price (€)</label>
                        <input type="number" name="discount_price" id="discount_price" class="form-control" step="0.01">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="allergens" class="form-label">Allergens</label>
                    <input type="text" name="allergens" id="allergens" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                </div>

                <!-- Submit -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Create Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
