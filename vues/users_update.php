<?php

use App\Controllers\UsersController;

require __DIR__ . './../vendor/autoload.php';

$controller = new UsersController();
echo $controller->updateUser();

$userController = new UsersController();
$userOptions = $userController->getUsersOptions();
?>
<a href="./">Retour</a>
<p>Mise à jour d'un utilisateur</p>
<form method="post" action="users_update.php" name ="userUpdateForm">
    <label for="id">Utilisateur :</label>
    <select name="id" id="id"><?= $userOptions ?></select>
    <br />
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname">
    <br />
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname">
    <br />
    <label for="email">Email :</label>
    <input type="text" name="email">
    <br />
    <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
    <input type="text" name="birthday">
    <br />
    <input type="submit" value="Modifier l'utilisateur">
</form>