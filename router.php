<?php 

define("ROOT", __DIR__);
$count = 1;
$uri = str_replace("/Projet-Web-App-Quiz", "", $_SERVER['REQUEST_URI'], $count);
//echo $uri; TODO
$page = explode("?", ltrim($uri, "/"), 2);   //remove "/" and $_GET values to isolate the page's name
$path =  $page[0];      //example : "/page1?=val1abc" --> "page1" = $page[0]
if ($path === "") {
	$path = "index";
}
//echo $path; //TODO Only active during Test
//echo $_SERVER['REQUEST_URI'].PHP_EOL; 
// echo ROOT.PHP_EOL; 
$allowedPages = [
	"index" => "view:index",
    "login" => "view:login",
    "register" => "view:register",
    "settings" => "view:settings",
	"quiz" => "view:quiz",
	"game" => "view:game",
    "process_login" => "controller:loginController",
    "process_logout" => "controller:logoutController",
    "process_register" => "controller:registerController"
    ];

function showView($view) {
    require (ROOT."/views/$view.php");
}

function showController($control) {
    require (ROOT."/controllers/$control.php");
}

//check if the requested URI is allowed
if(!array_key_exists($path, $allowedPages)){
	showView("error_404");
	exit;
}

$target = $allowedPages[$path];
$explodedTarget = explode(":", $target);
if($explodedTarget[0] === "view")
    showView($explodedTarget[1]);
else
    showController($explodedTarget[1]);

//exit();
// echo var_dump($_SERVER); //TODO Only active during Tests
// echo "===================";
// echo var_dump($_SESSION);
// echo "===================";
// echo var_dump($_GET);
// echo "===================";
// echo var_dump($_POST);
