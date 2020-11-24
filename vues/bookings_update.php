<?php

use App\Controllers\BookingsController;
use App\Controllers\UsersController;

require __DIR__ . './../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->updateBooking();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();
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
        <label for="user_id">Utilisateur :</label>
        <select name="user_id" id="user_id"><?= $userOptions ?></select>
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
