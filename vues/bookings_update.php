<?php

use App\Controllers\BookingsController;

require __DIR__ . './../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->updateBooking();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Modification d'une réservation</p>
    <form method="post" action="bookings_update.php" name ="bookingCreateForm">
        <label for="id">Id</label>
        <input type="number" name="id">
        <br />
        <label for="userId">Id de l'utilisateur </label>
        <input type="text" name="user_id">
        <br />
        <label for="date">Date et heure de réservation (jj-mm-aaaa hh:mm) :</label>
        <input type="datetime-local" name="date">
        <br />
        <label for="adId">Id de l'annonce :</label>
        <input type="text" name="ad_id">
        <br />

        <input type="submit" value="Modifier une réservation">
    </form>
</body>
</html>
