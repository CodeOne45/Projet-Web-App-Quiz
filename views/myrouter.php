<?php 

$chemin = "/";
if($_GET){
    $chemin = isset($_GET["chemin"]) ? $_GET["chemin"] : "/";
}
$chemin = str_replace("views/", "", $chemin);
//print($chemin);


//vérifier que c'est l'une des pages autorisées

$pages_correspondantes = ["index", "quiz", "footer", "game", "header", "login", "settings", "register"];
$autho_pages = $pages_correspondantes; //celle mises dans l'url


if(in_array($chemin, $autho_pages)){
    //print("\nchemin accepté");
    $page_ac = "";
    for ($i = 0; $i < count($autho_pages); $i++) {
        if($autho_pages[$i] === $chemin){
            $page_ac = $pages_correspondantes[$i];
        }
    }
    
    if($page_ac !== ""){
        require("./".$page_ac.".php");
    }
    else{
        require("./error_404.php");
    }
}
else{
    require("./error_404.php");
}

?>