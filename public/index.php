<?php

session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

$app = App\App::getInstance();
$app->title = "titre de test";

$app2 = App\App::getInstance();
echo $app2->title;

