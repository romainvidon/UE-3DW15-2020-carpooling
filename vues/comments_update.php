<?php

use App\Controllers\CommentsController;

require __DIR__ . '/../vendor/autoload.php';

$controller = new CommentsController();
echo $controller->updateComment();
?>

<p>Modification d'une commentaire</p>
<form method="post" action="comments_update.php" name ="commentUpdateForm">
    <label for="id">Id :</label>
    <input type="number" name="id">
    <br />
    <label for="message">Message</label>
    <textarea name="message" id="message"></textarea>
    <br />
    <label for="user_id">Identifiant de l'utilisateur :</label>
    <input type="number" name="user_id" id="user_id">
    <br />
    <label for="ad_id">Identifiant de l'annonce' :</label>
    <input type="number" name="ad_id" id="ad_id">
    <br />
    <input type="submit" value="Modifier un commentaire">
</form>