<?php 

define(ROOT, __DIR__);

$chemin = ltrim($_SERVER['REQUEST_URI'], "/");
if ($chemin === "") {
	$chemin = "index";
}

//vérifier que c'est l'une des pages autorisées

$pages_correspondantes = [
	"index" => "view:index",
	"quiz" => "view:quiz",
	"login" => "view:login",
	"process_login" => "controller:login",
	"game", "login", "settings", "register"];
$autho_pages = $pages_correspondantes; //celle mises dans l'url

function afficherVue($nom) {
	require (ROOT."/views/$nom.php");
}


if(!in_array($chemin, $autho_pages)){
	afficherVue("error_404");
	exit;
}

$cible = $pages_correspondantes[$chemin];
$c = explode(":" $cible);
if (

afficherVue($chemin);

?>
