<?php

namespace App\Controllers;

use App\Services\BookingService;

class BookingsController
{
    /**
     * Return the html for the create action.
     */
    public function createBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['userId']) &&
            isset($_POST['date']) &&
            isset($_POST['adId'])) {
            // Create the booking :
            $bookingsService = new BookingService();
            $isOk = $bookingsService->setBooking(
                null,
                $_POST['date'],
                $_POST['userId'],
                $_POST['adId']
            );
            if ($isOk) {
                $html = 'La réservation est créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getBookings(): string
    {
        $html = '';

        // Get all bookings :
        $bookingService = new BookingService();
        $bookings = $bookingService->getBookings();

        // Get html :
        foreach ($bookings as $booking) {
            $html .=
                '#' . $booking->getId() . ' ' .
                $booking->getReservationdate()->format('d-m-Y H:i') . ' ' .
                $booking->getUserId() . ' ' .
                $booking->getAddId() . ' ' . '<br />';
        }

        return $html;
    }

}
