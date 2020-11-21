<?php

require '../vendor/autoload.php';
$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', 'index');

$match = $router->match();

require '../views/header.php';
if (is_array($match)) {
    $params = $match['params'];
    require "../views/{$match['target']}.php";
    } 
    else {
    echo 404;
    }
require '../views/footer.php';