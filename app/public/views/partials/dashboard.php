<div class="container mt-5">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['user']['username']) ?>!</h2>
    <p>You are logged in 🎉</p>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>
