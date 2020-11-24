<?php

use App\Controllers\CarsController;
use App\Controllers\UsersController;

require __DIR__ . './../vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();

?>

<p>Modification d'une voiture</p>
<form method="post" action="cars_update.php" name ="carUpdateForm">
    <label for="id">Id</label>
    <input type="number" name="id">
    <br />
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
    <input type="submit" value="Modifier une voiture">
</form>