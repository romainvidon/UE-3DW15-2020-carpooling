<?php

use App\Controllers\AdsController;

require __DIR__ . './../vendor/autoload.php';

$controller = new AdsController();

echo $controller->updateAd();

?>
<p>Modification d'une d'une annonce</p>
<form method="post" action="ads_update.php" name ="adUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="title">Titre</label>
    <input type="text" name="title" id="title">
    <br />
    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>
    <br />
    <label for="user_id">Identifiant de l'utilisateur :</label>
    <input type="number" name="user_id" id="user_id">
    <br />
    <label for="car_id">Identifiant de la voiture :</label>
    <input type="number" name="car_id" id="car_id">
    <br />
    <input type="submit" value="Créer une annonce">
</form>
