<?php

use App\Controllers\UsersController;

require __DIR__ . './../vendor/autoload.php';

$controller = new UsersController();
echo $controller->deleteUser();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();
?>
<a href="./">Retour</a>
<p>Supression d'un utilisateur</p>
<form method="post" action="users_delete.php" name ="userDeleteForm">
    <label for="id">Utilisateur</label>
    <select name="id" id="id"><?= $userOptions ?></select>
    <br />
    <input type="submit" value="Supprimer un utilisateur">
</form>