<?php
require_once(__DIR__ . "/../models/ReservationModel.php");

class ReservationController
{
    private $model;

    public function __construct() {
        $this->model = new ReservationModel();
    }

    public function create($user_id, $date, $time, $num_guests, $special_request = '') {
        return $this->model->add($user_id, $date, $time, $num_guests, $special_request);
    }

    public function getUserReservations($user_id) {
        return $this->model->getByUser($user_id);
    }
    
    public function cancel($reservation_id, $user_id) {
        return $this->model->cancelReservation($reservation_id, $user_id);
    }
    
    public function getUserReservationsSplit($user_id)
    {
        $model = new ReservationModel();
        $all = $model->getByUser($user_id);

        $upcoming = [];
        $archived = [];

        $today = date('Y-m-d');

        foreach ($all as $res) {
            if (in_array($res['status'], ['pending', 'confirmed']) && $res['reservation_date'] >= $today) {
                $upcoming[] = $res;
            } else {
                $archived[] = $res;
            }
        }

        return ['upcoming' => $upcoming, 'archived' => $archived];
    }
}
