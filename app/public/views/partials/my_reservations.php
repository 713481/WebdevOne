<div class="container mt-5 mb-5">

    <!-- UPCOMING RESERVATIONS -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Upcoming Reservations</h4>
        </div>
        <div class="card-body p-0">
            <?php
            $reservations = $upcoming_reservations;
            $show_actions = true;
            require(__DIR__ . '/../partials/reservation_table.php');
            ?>
        </div>
    </div>

    <!-- PAST & CANCELLED RESERVATIONS -->
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Past & Cancelled Reservations</h4>
        </div>
        <div class="card-body p-0">
            <?php
            $reservations = $archived_reservations;
            $show_actions = false;
            require(__DIR__ . '/../partials/reservation_table.php');
            ?>
        </div>
    </div>

</div>
