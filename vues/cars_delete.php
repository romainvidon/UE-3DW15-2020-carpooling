<?php

use App\Controllers\CarsController;

require __DIR__ . '/../vendor/autoload.php';

$controller = new CarsController();
echo $controller->deleteCar();

$carsOptions = $controller->getCarsOptions();
?>
<a href="./">Retour</a>
<p>Supression d'une voiture</p>
<form method="post" action="cars_delete.php" name ="carDeleteForm">
    <label for="id">Voiture :</label>
    <select name="id" id="id"><?= $carsOptions ?></select>
    <br />
    <input type="submit" value="Supprimer une voiture">
</form>