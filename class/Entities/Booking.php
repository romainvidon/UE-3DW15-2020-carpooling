<?php

namespace App\Entities;

use DateTime;

class Booking
{
    private $id;
    private $reservationdate;
    private $user_id;
    private $add_id;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): void
    {
        $this->id = $id;

    }

    /**
     * Get the value of reservationdate
     */
    public function getReservationdate(): DateTime
    {
        return $this->reservationdate;
    }

    /**
     * Set the value of reservationdate
     */
    public function setReservationdate(DateTime $reservationdate): void
    {
        $this->reservationdate = $reservationdate;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * Get the value of add_id
     */
    public function getAddId(): int
    {
        return $this->add_id;
    }

    /**
     * Set the value of add_id
     */
    public function setAddId($add_id): void
    {
        $this->add_id = $add_id;
    }

}