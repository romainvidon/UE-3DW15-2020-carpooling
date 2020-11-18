<?php

namespace App\Services;

use App\Entities\Booking;
use DateTime;

class BookingService
{
    /**
     * Create or update a booking date.
     */
    public function setBooking(?string $id, string $reservationdate, string $user_id, string $add_id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $reservationdateDateTime = new DateTime($reservationdate);
        if (empty($id)) {
            $isOk = $dataBaseService->createBooking($reservationdateDateTime, $user_id, $add_id);
        } else {
            $isOk = $dataBaseService->updateBooking($id, $reservationdateDateTime, $user_id, $add_id);
        }
        
        return $isOk;
    }

    /**
     * Return all bookings.
     */
    public function getBookings(): array
    {
        $bookings = [];

        $dataBaseService = new DataBaseService();
        $bookingsDTO = $dataBaseService->getBookings();
        if (!empty($bookingsDTO)) {
            foreach ($bookingsDTO as $bookingDTO) {
                $booking = new Booking();
                $booking->setId($bookingDTO['id']);
                $date = new DateTime($bookingDTO['reservationdate']);
                $booking->getUserId($bookingDTO['userId']);
                $booking->getAddId($bookingDTO['addId']);
                if ($date !== false) {
                    $booking->setReservationdate($date);
                }
                $bookings[] = $booking;
            }
        }

        return $bookings;
    }

    /**
     * Delete a booking.
     */
    public function deleteBooking(int $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteBooking($id);

        return $isOk;
    }
}
