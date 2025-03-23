<?php
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
                    <a class="nav-link <?= ($current_page == '' || $current_page == 'index.php') ? 'active' : '' ?>" href=".">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'about' || $current_page == 'about.php') ? 'active' : '' ?>" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'menu' || $current_page == 'menu.php') ? 'active' : '' ?>" href="/menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'reservation' || $current_page == 'reservation.php') ? 'active' : '' ?>" href="#">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'contact' || $current_page == 'contact.php') ? 'active' : '' ?>" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'faq' || $current_page == 'faq.php') ? 'active' : '' ?>" href="#">FAQ</a>
                </li>
            </ul>
            <!-- Login/Register Button -->
            <a class="btn btn-primary ms-auto" href="/login">Login/Register</a>
        </div>
    </div>
</nav>