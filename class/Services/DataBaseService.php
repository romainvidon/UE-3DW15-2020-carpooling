<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = '';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format("Y-m-d"),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format("Y-m-d"),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create a car.
     */
    public function createCar(string $model, string $user_id): bool
    {
        $isOk = false;

        $data = [
            'model' => $model,
            'user_id' => $user_id
        ];
        $sql = 'INSERT INTO cars(model, user_id) VALUES (:model, :user_id)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Create an ad.
     */
    public function createAd(string $title, string $description, string $user_id, string $car_id): bool
    {
        $isOk = false;

        $data = [
            'title' => $title,
            'description' => $description,
            'car_id' => $car_id,
            'user_id' => $user_id
        ];
        $sql = 'INSERT INTO ads(title, description, user_id, car_id) VALUES (:title, :description, :car_id, :user_id)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all ads.
     */
    public function getAds(): array
    {
        $ads = [];

        $sql = 'SELECT * FROM ads';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $ads = $results;
        }

        return $ads;
    }

    /*==================================================*/


    /**
     * Create a booking.
     */
    public function createBooking(DateTime $reservationdate, string $user_id, string $add_id): bool
    {
        $isOk = false;

        $data = [
            'reservationdate' => $reservationdate->format("Y-m-d H:i"),
            'userId' => $user_id,
            'addId' => $add_id,
        ];
        $sql = 'INSERT INTO bookings (reservationdate, user_id, ad_Id) VALUES (:reservationdate, :userId, :addId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all bookings.
     */
    public function getBookings(): array
    {
        $bookings = [];

        $sql = 'SELECT * FROM bookings';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $bookings = $results;
        }

        return $bookings;
    }

    /**
     * Update a booking.
     */
    public function updateBooking(int $id, DateTime $reservationdate, int $user_id, int $add_id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'reservationdate' => $reservationdate->format("Y-m-d H:i"),
            'userId' => $user_id,
            'addId' => $add_id,
        ];
        $sql = 'UPDATE bookings SET reservationdate = :reservationdate, userId = :userId, addId = :addId WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a booking.
     */
    public function deleteBooking(int $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM bookings WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}
