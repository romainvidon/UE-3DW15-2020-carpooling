<?php

use App\Controllers\CommentsController;
use App\Controllers\UsersController;
use App\Controllers\AdsController;

require __DIR__ . '/../vendor/autoload.php';

$controller = new CommentsController();
echo $controller->createComment();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();

$adsController = new AdsController();
$adsOptions = $adsController->getAdsOptions();
?>
<a href="./">Retour</a>
<p>Création d'une commentaire</p>
<form method="post" action="comments_create.php" name ="commentCreateForm">
    <label for="message">Message</label>
    <textarea name="message" id="message"></textarea>
    <br />
    <label for="user_id">Utilisateur :</label>
    <select name="user_id" id="user_id"><?= $userOptions ?></select>
    <br />
    <label for="ad_id">Annonce :</label>
    <select name="ad_id" id="ad_id"><?= $adsOptions ?></select>
    <br />
    <input type="submit" value="Créer un commentaire">
</form>