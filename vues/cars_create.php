<?php

use App\Controllers\CarsController;
use App\Controllers\UsersController;

require __DIR__ . './../vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCar();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();


?>

<p>Création d'une voiture</p>
<form method="post" action="cars_create.php" name ="carCreateForm">
    <label for="brand">Marque</label>
    <input type="text" name="brand" id="brand">
    <br />
    <label for="model">Modèle</label>
    <input type="text" name="model" id="model">
    <br />
    <label for="maxslots">Nombres de places maximum</label>
    <input type="number" name="maxslots" id="maxslots">
    <br />
    <label for="user_id">Propriétaire :</label>
    <select name="user_id" id="user_id"><?= $userOptions ?></select>
    <br />
    <input type="submit" value="Créer une voiture">
</form>