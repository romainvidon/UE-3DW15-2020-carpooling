<?php

use App\Controllers\AdsController;

require __DIR__ . '/../vendor/autoload.php';

$controller = new AdsController();
echo $controller->deleteAd();

$adsOptions = $controller->getAdsOptions();
?>
<a href="./">Retour</a>
<p>Supression d'une annonce</p>
<form method="post" action="ads_delete.php" name ="adDeleteForm">
    <label for="id">Annonce :</label>
    <select name="id" id="id"><?= $adsOptions ?></select>
    <br />
    <input type="submit" value="Supprimer une annonce">
</form>