<div class="container mt-5">
    <h1 class="text-center">Our Menu</h1>

    <!-- Display discounted items first (Special Offers) -->
    <?php if (!empty($discounted)): ?>
        <div class="col-12">
            <h2 class="text-uppercase mt-4">💥 Special Offers</h2>
            <hr>
        </div>
        <div class="row">
            <?php foreach ($discounted as $item): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?= htmlspecialchars($item['image_url']) ?>" class="card-img-top menu-img" alt="<?= htmlspecialchars($item['name']) ?>">
                        <div class="card-body">
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">🔥 Sale</span>
                            <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
                            <p>
                                <span class="text-danger fw-bold">€<?= number_format($item['discount_price'], 2) ?></span>
                                <span class="text-muted text-decoration-line-through ms-2">€<?= number_format($item['price'], 2) ?></span>
                            </p>
                            <?php if (!empty($item['allergens'])): ?>
                                <p class="card-text"><small><strong>Allergens:</strong> <?= htmlspecialchars($item['allergens']) ?></small></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Grouped menu items by category -->
    <div class="row mt-4">
        <?php if (!empty($menu)): ?>
            <?php foreach ($menu as $category => $items): ?>
                <div class="col-12">
                    <h2 class="text-uppercase mt-4"><?= htmlspecialchars($category) ?></h2>
                    <hr>
                </div>
                <?php foreach ($items as $item): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?= htmlspecialchars($item['image_url']) ?>" class="card-img-top menu-img" alt="<?= htmlspecialchars($item['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
                                <?php if (!empty($item['discount_price'])): ?>
                                    <p class="card-text">
                                        <span class="text-danger fw-bold">€<?= number_format($item['discount_price'], 2) ?></span>
                                        <span class="text-muted text-decoration-line-through ms-2">€<?= number_format($item['price'], 2) ?></span>
                                    </p>
                                <?php else: ?>
                                    <p><strong>€<?= number_format($item['price'], 2) ?></strong></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No menu items available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
