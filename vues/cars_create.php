<?php

use App\Controllers\CarsController;

require __DIR__ . './../vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCar();
?>

<p>Création d'une voiture</p>
<form method="post" action="cars_create.php" name ="carCreateForm">
    <label for="model">Modèle</label>
    <input type="text" name="model" id="model">
    <br />
    <label for="user_id">Identifiant de l'utilisateur propriétaire :</label>
    <input type="number" name="user_id" id="userid">
    <br />
    <input type="submit" value="Créer une voiture">
</form>