<?php

use App\Controllers\BookingsController;

require __DIR__ . './../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->createBooking();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Création d'une réservation</p>
    <form method="post" action="bookings_create.php" name ="bookingCreateForm">
        <label for="userId">Id de l'utilisateur pour qui vous réservez</label>
        <input type="text" name="userId">
        <br />
        <label for="date">Date et heure de réservation (jj-mm-aaaa hh:mm) :</label>
        <input type="datetime-local" name="date">
        <br />
        <label for="adId">Id de l'annonce pour laquelle vous réservez :</label>
        <input type="text" name="adId">
        <br />

        <input type="submit" value="Créer une réservation">
    </form>
</body>
</html>
