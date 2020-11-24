<?php

namespace App\Controllers;

use App\Services\BookingsService;

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
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->setBooking(
                null,
                $_POST['date'],
                $_POST['userId'],
                $_POST['adId']
            );
            if ($isOk) {
                $html = 'La réservation a été créée avec succès.';
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
        $bookingService = new BookingsService();
        $bookings = $bookingService->getBookings();

        // Get html :
        foreach ($bookings as $booking) {
            $html .=
                '#' . $booking->getId() . ' ' .
                $booking->getReservationdate()->format('d-m-Y H:i') . ' ' .
                $booking->getUserId() . ' ' .
                $booking->getAdId() . ' ' . '<br />';
        }

        return $html;
    }

    public function updateBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['user_id']) &&
            isset($_POST['date']) &&
            isset($_POST['ad_id'])) {
            // Update the booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->setBooking(
                $_POST['id'],
                $_POST['date'],
                $_POST['user_id'],
                $_POST['ad_id']
            );
            if ($isOk) {
                $html = 'La réservation a été modifiée avec succès.';
            } else {
                $html = 'Erreur lors de la modification de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete a booking.
     */
    public function deleteBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->deleteBooking($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }

    public function getBookingsOptions() : string
    {
        $html = "";
        
        // Get all ads :
        $bookingsService = new BookingsService();
        $bookings = $bookingsService->getBookings();
        
        // Get html :
        foreach ($bookings as $booking) {
            $html .=
                "<option value=\""
                . $booking->getId()
                . "\">"
                . $booking->getId()
                . " : "
                . $booking->getAdId()
                . " // "
                . $booking->getReservationdate()->format("d/m/Y H:i") . ' '
                . "</option>";
        }


        return $html;
    }
}
