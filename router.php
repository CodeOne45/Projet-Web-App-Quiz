<?php

define("ROOT", __DIR__);
$count = 1;
$uri = str_replace("/Projet-Web-App-Quiz", "", $_SERVER['REQUEST_URI'], $count);

$page = explode("?", ltrim($uri, "/"), 2);   //remove "/" and $_GET values to isolate the page's name
$path =  $page[0];      //example : "/page1?=val1abc" --> "page1" = $page[0]
if ($path === "") {
    $path = "index";
}

$allowedPages = [
    "index" => "view:index",
    "login" => "view:login",
    "register" => "view:register",
    "settings" => "view:settings",
    "quiz" => "view:quiz",
    "game" => "view:game",
    "lobby" => "view:lobby",
    "visitor" => "view:visitor",
    "score"=> "view:score",
    "process_login" => "controller:loginController",
    "process_logout" => "controller:logoutController",
    "process_multyplayer" => "controller:multiplayerController",
    "process_register" => "controller:registerController",
    "process_game" => "controller:setGameController"
];

function showView($view)
{
    require(ROOT . "/views/$view.php");
}

function showController($control)
{
    require(ROOT . "/controllers/$control.php");
}

//check if the requested URI is allowed
if (!array_key_exists($path, $allowedPages)) {
    showView("error_404");
    exit;
}

$target = $allowedPages[$path];
$explodedTarget = explode(":", $target);
if ($explodedTarget[0] === "view")
    showView($explodedTarget[1]);
else
    showController($explodedTarget[1]);
