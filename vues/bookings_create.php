<?php

use App\Controllers\BookingsController;
use App\Controllers\UsersController;

require __DIR__ . './../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->createBooking();

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
    <a href="./">Retour</a>
    <p>Création d'une réservation</p>
    <form method="post" action="bookings_create.php" name ="bookingCreateForm">
        <label for="user_id">Utilisateur :</label>
        <select name="user_id" id="user_id"><?= $userOptions ?></select>
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
