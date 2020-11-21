<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Modification d'une voiture</p>
<form method="post" action="cars_update.php" name ="carUpdateForm">
    <label for="id">Id</label>
    <input type="number" name="id">
    <br />
    <label for="model">Modèle</label>
    <input type="text" name="model" id="model">
    <br />
    <label for="user_id">Identifiant de l'utilisateur propriétaire :</label>
    <input type="number" name="user_id" id="user_id">
    <br />
    <input type="submit" value="Modifier une voiture">
</form>