<?php

use App\Controllers\BookingsController;

require __DIR__ . './../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->deleteBooking();
$bookingsOptions = $controller->getBookingsOptions();

?>
<a href="./">Retour</a>
<p>Supression d'une réservation</p>
<form method="post" action="bookings_delete.php" name ="bookingDeleteForm">
    <label for="id">Réservation :</label>
    <select name="id" id="id"><?= $bookingsOptions ?></select>
    <br />
    <input type="submit" value="Supprimer une réservation">
</form>