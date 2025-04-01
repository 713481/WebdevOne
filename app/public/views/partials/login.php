<div class="container mt-5" style="max-width: 500px;">
    <h2 class="text-center mb-4">Login</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form action="/login" method="POST" class="border p-4 rounded bg-light shadow-sm">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100" type="submit">Login</button>

        <div class="text-center mt-3">
            Don't have an account? <a href="/register">Register here</a>
        </div>
    </form>
</div>
