<div class="container mt-5">
        <h1 class="text-center">Our Menu</h1>
        <div class="row mt-4">
            <?php if (!empty($menu)): ?>
                <?php foreach ($menu as $category => $items): ?>
                    <div class="col-12">
                        <h2 class="text-uppercase mt-4"><?= htmlspecialchars($category) ?></h2>
                        <hr>
                    </div>
                    <?php foreach ($items as $item): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <?php if (!empty($item['image_url'])): ?>
                                    <img src="<?= htmlspecialchars($item['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['name']) ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
                                    <p class="card-text"><strong>Price:</strong> €<?= number_format($item['price'], 2) ?></p>
                                    <?php if (!empty($item['allergens'])): ?>
                                        <p class="card-text"><small><strong>Allergens:</strong> <?= htmlspecialchars($item['allergens']) ?></small></p>
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