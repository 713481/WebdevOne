<?php
// Check session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Get the current page name
$current_page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand Logo and Name -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="../assets/img/logo.png" alt="Logo not found" width="50" height="50" class="me-2">
            <span>Restaurant Peking</span>
        </a>

        <!-- Hamburger Menu (for mobile view) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == '' || $current_page == 'index.php') ? 'active' : '' ?>" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'about' || $current_page == 'about.php') ? 'active' : '' ?>" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'menu' || $current_page == 'menu.php') ? 'active' : '' ?>" href="/menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'reservation' || $current_page == 'reservation.php') ? 'active' : '' ?>" href="/reservation">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'contact' || $current_page == 'contact.php') ? 'active' : '' ?>" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'review' || $current_page == 'review.php') ? 'active' : '' ?>" href="/review">Review</a>
                </li>
            </ul>
            <!-- Login/Register or Profile Dropdown -->
            <?php if (isset($_SESSION['user'])): ?>
                <div class="ms-auto dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= htmlspecialchars($_SESSION['user']['username']) ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><a class="dropdown-item" href="/my-reservations">My Reservations</a></li>
                        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                            <li><a class="dropdown-item" href="/admin">Admin Dashboard</a></li>
                            <li><a class="dropdown-item" href="/admin/menu">Edit menu</a></li>
                        <?php endif; ?>

                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a class="btn btn-primary ms-auto" href="/login">Login/Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>