<?php

use App\Router\Router;

//la constante contenant le dossier racine
define('ROOT',dirname(__DIR__));

session_start();

//Autoloader
require "vendor/autoload.php";

//on instancie Router
$routeur = new Router();
$routeur->start();

?>

