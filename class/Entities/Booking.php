<?php

namespace App\Entities;

use DateTime;

class Booking
{
    private $id;
    private $reservationdate;
    private $user_id;
    private $ad_id;

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
     * Get the value of ad_id
     */
    public function getAdId(): int
    {
        return $this->ad_id;
    }

    /**
     * Set the value of ad_id
     */
    public function setAdId($ad_id): void
    {
        $this->ad_id = $ad_id;
    }
}
