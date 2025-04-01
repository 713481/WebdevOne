<?php

require_once(__DIR__ . "/BaseModel.php");

class ReservationModel extends BaseModel
{
    public function add($user_id, $date, $time, $num_guests, $special_request = null)
    {
        $stmt = self::$pdo->prepare("
            INSERT INTO reservation (user_id, reservation_date, reservation_time, num_guests, special_request)
            VALUES (:user_id, :reservation_date, :reservation_time, :num_guests, :special_request)
        ");

        return $stmt->execute([
            ':user_id' => $user_id,
            ':reservation_date' => $date,
            ':reservation_time' => $time,
            ':num_guests' => $num_guests,
            ':special_request' => $special_request
        ]);
    }

    public function getByUser($user_id)
    {
        $stmt = self::$pdo->prepare("
            SELECT reservation_id, reservation_date, reservation_time, num_guests, status, special_request, created_at
            FROM reservation
            WHERE user_id = :user_id
            ORDER BY reservation_date ASC, reservation_time ASC
        ");
    
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll();
    }    

    public function cancelReservation($reservation_id, $user_id)
    {
        $stmt = self::$pdo->prepare("
            UPDATE reservation
            SET status = 'cancelled'
            WHERE reservation_id = :reservation_id AND user_id = :user_id
        ");
        
        return $stmt->execute([
            ':reservation_id' => $reservation_id,
            ':user_id' => $user_id
        ]);
    }

    public function getUpcomingReservations($user_id) {
        $stmt = self::$pdo->prepare("
            SELECT reservation_id, user_id, reservation_date, reservation_time, num_guests, status, special_request, created_at, table_id
            FROM reservation
            WHERE user_id = :user_id 
            AND status IN ('pending', 'confirmed') 
            AND reservation_date >= CURDATE()
            ORDER BY reservation_date ASC
        ");
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll();
    }
    
    public function getPastOrCancelledReservations($user_id) {
        $stmt = self::$pdo->prepare("
            SELECT reservation_id, user_id, reservation_date, reservation_time, num_guests, status, special_request, created_at, table_id
            FROM reservation
            WHERE user_id = :user_id 
            AND (
                status = 'cancelled' 
                OR (status = 'confirmed' AND reservation_date < CURDATE())
            )
            ORDER BY reservation_date DESC
        ");
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll();
    }
    
    public function getAll($statusArray = null) {
        if ($statusArray) {
            $placeholders = implode(',', array_fill(0, count($statusArray), '?'));
            $stmt = self::$pdo->prepare("
                SELECT 
                    r.reservation_id,
                    r.user_id,
                    u.full_name,
                    u.email,
                    r.reservation_date,
                    r.reservation_time,
                    r.num_guests,
                    r.status,
                    r.special_request,
                    r.created_at,
                    r.table_id
                FROM reservation r
                JOIN users u ON r.user_id = u.id
                WHERE r.status IN ($placeholders)
                ORDER BY r.reservation_date ASC
            ");
            $stmt->execute($statusArray);
        } else {
            $stmt = self::$pdo->prepare("
                SELECT 
                    r.reservation_id,
                    r.user_id,
                    u.full_name,
                    u.email,
                    r.reservation_date,
                    r.reservation_time,
                    r.num_guests,
                    r.status,
                    r.special_request,
                    r.created_at,
                    r.table_id
                FROM reservation r
                JOIN users u ON r.user_id = u.id
                ORDER BY r.reservation_date ASC
            ");
            $stmt->execute();
        }
    
        return $stmt->fetchAll();
    }
    
    
    public function getByStatus($status) {
        return $this->getAll([$status]);
    }

    public function assignTable($reservation_id, $table_id) {
        $stmt = self::$pdo->prepare("
            UPDATE reservation
            SET table_id = :table_id, status = 'confirmed'
            WHERE reservation_id = :reservation_id
        ");
        return $stmt->execute([
            ':table_id' => $table_id,
            ':reservation_id' => $reservation_id
        ]);
    }
    
    public function getAllTables() {
        $stmt = self::$pdo->prepare("
            SELECT table_id, table_number, capacity, location, description 
            FROM restaurant_table 
            ORDER BY table_number ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }    
    
    public function delete($reservation_id) {
        $stmt = self::$pdo->prepare("DELETE FROM reservation WHERE reservation_id = :id");
        return $stmt->execute([':id' => $reservation_id]);
    }
    
    public function getById($id) {
        $stmt = self::$pdo->prepare("
            SELECT reservation_id, user_id, reservation_date, reservation_time, num_guests,
                   status, special_request, created_at, table_id
            FROM reservation
            WHERE reservation_id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }    
    
    public function update($data) {
        $stmt = self::$pdo->prepare("
            UPDATE reservation SET
                reservation_date = :date,
                reservation_time = :time,
                num_guests = :guests,
                status = :status,
                special_request = :request,
                table_id = :table_id
            WHERE reservation_id = :id
        ");
    
        return $stmt->execute([
            ':date' => $data['reservation_date'],
            ':time' => $data['reservation_time'],
            ':guests' => $data['num_guests'],
            ':status' => $data['status'],
            ':request' => $data['special_request'],
            ':table_id' => $data['table_id'],
            ':id' => $data['reservation_id']
        ]);
    }
    
}
