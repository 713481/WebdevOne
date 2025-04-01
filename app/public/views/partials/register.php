<div class="container mt-5" style="max-width: 500px;">
    <h2 class="text-center mb-4">Create an Account</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success">Registration successful! <a href="/login">Login here</a>.</div>
    <?php else: ?>
        <form action="/register" method="POST" class="border p-4 rounded bg-light shadow-sm">

            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="John Doe">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="you@example.com">
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone</label>
                <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="+123456789">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100" type="submit">Register</button>

            <div class="text-center mt-3">
                Already have an account? <a href="/login">Login</a>
            </div>
        </form>
    <?php endif; ?>
</div>
