<?php

use App\Controllers\CommentsController;

require __DIR__ . '/../vendor/autoload.php';

$controller = new CommentsController();
echo $controller->deleteComment();
$commentsOptions = $controller->getCommentsOptions();
?>
<a href="./">Retour</a>
<p>Supression d'un commentaire</p>
<form method="post" action="comments_delete.php" name ="commentsDeleteForm">
    <label for="id">Commentaire :</label>
    <select name="id" id="id"><?= $commentsOptions ?></select>
    <br />
    <input type="submit" value="Supprimer un commentaire">
</form>