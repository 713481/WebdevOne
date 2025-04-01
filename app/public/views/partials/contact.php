<div class="container mt-5" style="max-width: 800px;">
    <h2 class="text-center mb-4">Contact Us</h2>

    <!-- Contact Info Section -->
    <?php foreach ($contactInfo as $info): ?>
        <?php if ($info['type'] === 'address'): ?>
            <h5><?= htmlspecialchars($info['label']) ?></h5>
            
            <!-- Google Maps Embed -->
            <div class="mb-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.406537046977!2d4.8103282!3d52.4435591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5fd2d0397e705%3A0xb6ddae7de59393cd!2sSpitsbergen%206%2C%201505%20EH%20Zaandam%2C%20Netherlands!5e0!3m2!1sen!2snl!4v1711936300000!5m2!1sen!2snl"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <p>
                <?= htmlspecialchars($info['value']) ?><br>
                <a href="https://www.google.com/maps/place/<?= urlencode($info['value']) ?>" target="_blank">
                    View on Google Maps
                </a>
            </p>
        <?php elseif ($info['type'] === 'phone'): ?>
            <h5><?= htmlspecialchars($info['label']) ?></h5>
            <p><a href="tel:<?= htmlspecialchars($info['value']) ?>"><?= htmlspecialchars($info['value']) ?></a></p>
        <?php elseif ($info['type'] === 'email'): ?>
            <h5><?= htmlspecialchars($info['label']) ?></h5>
            <p><a href="mailto:<?= htmlspecialchars($info['value']) ?>"><?= htmlspecialchars($info['value']) ?></a></p>
        <?php endif; ?>
    <?php endforeach; ?>

    <hr>

    <h4 class="mb-3">Send Us a Message</h4>
    <form method="POST" action="/contact/message">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Send Message</button>
        </div>
    </form>
</div>
