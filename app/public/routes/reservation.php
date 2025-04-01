<?php
    require_once(__DIR__ . "/../controllers/ReservationController.php");
    // Create a new reservation
    Route::add('/reservation', function () {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        $error = '';
        $success = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new ReservationController();

            $user_id = $_SESSION['user']['id'];
            $date = $_POST['reservation_date'];
            $time = $_POST['reservation_time'];
            $guests = $_POST['num_guests'];
            $request = $_POST['special_request'] ?? '';

            $success = $controller->create($user_id, $date, $time, $guests, $request);

            if (!$success) {
                $error = "Unable to save your reservation. Try again.";
            }
        }

        require(__DIR__ . "/../views/pages/reservation.php");
    }, ['GET', 'POST']);
    // Get the reservations to show
    Route::add('/my-reservations', function () {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
    
        $controller = new ReservationController();
        $user_id = $_SESSION['user']['id'];
        $data = $controller->getUserReservationsSplit($user_id);
        
        $upcoming_reservations = $data['upcoming'];
        $archived_reservations = $data['archived'];
    
        require_once(__DIR__ . '/../views/pages/my_reservations.php');
    });
    
    // When user cancels reservation before it is confirmed
    Route::add('/cancel-reservation/([0-9]+)', function ($reservationId) {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
    
        $controller = new ReservationController();
        $userId = $_SESSION['user']['id'];
    
        $controller->cancel($reservationId, $userId);
    
        // Redirect back to "My Reservations"
        header("Location: /my-reservations");
        exit();
    });
    
