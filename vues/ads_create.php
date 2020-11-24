<?php

use App\Controllers\AdsController;
use App\Controllers\UsersController;
use App\Controllers\CarsController;

require __DIR__ . '/../vendor/autoload.php';

$controller = new AdsController();
echo $controller->createAd();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();

$carsController = new CarsController();
$carsOptions = $carsController->getCarsOptions();
?>
<a href="./">Retour</a>
<p>Création d'une annonce</p>
<form method="post" action="ads_create.php" name ="adCreateForm">
    <label for="title">Titre</label>
    <input type="text" name="title" id="title">
    <br />
    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>
    <br />
    <label for="user_id">Utilisateur :</label>
    <select name="user_id" id="user_id"><?= $userOptions ?></select>
    <br />
    <label for="car_id">Voiture :</label>
    <select name="car_id" id="car_id"><?= $carsOptions ?></select>
    <br />
    <input type="submit" value="Créer une annonce">
</form>