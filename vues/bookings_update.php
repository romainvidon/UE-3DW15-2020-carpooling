<?php

use App\Controllers\BookingsController;
use App\Controllers\UsersController;
use App\Controllers\AdsController;

require __DIR__ . './../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->updateBooking();
$bookingsOptions = $controller->getBookingsOptions();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();

$adsController = new AdsController();
$adsOptions = $adsController->getAdsOptions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./">Retour</a>
    <p>Modification d'une réservation</p>
    <form method="post" action="bookings_update.php" name ="bookingCreateForm">
        <label for="id">Réservation :</label>
        <select name="id" id="id"><?= $bookingsOptions ?></select>
        <br />
        <label for="user_id">Utilisateur :</label>
        <select name="user_id" id="user_id"><?= $userOptions ?></select>
        <br />
        <label for="ad_id">Annonce :</label>
        <select name="ad_id" id="ad_id"><?= $adsOptions ?></select>
        <br />
        <label for="date">Date et heure de réservation (jj-mm-aaaa hh:mm) :</label>
        <input type="datetime-local" name="date">
        <br />
        <input type="submit" value="Modifier une réservation">
    </form>
</body>
</html>
