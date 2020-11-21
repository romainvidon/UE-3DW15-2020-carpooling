<?php

use App\Controllers\AdsController;
use App\Entities\Session;

require __DIR__ . './../vendor/autoload.php';

$Session = new Session();

$controller = new AdsController();

$result =  $controller->createAd();

$Session->setFlash($result[0], $result[1]); //text, color

header('Location: annonces.php');
?>
