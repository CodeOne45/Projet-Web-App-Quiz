<?php
require_once 'GameController.php';
session_start();
// print_r($_SESSION); //for find error
// print_r($_GET);
// print_r($_POST);
if(isset($_GET["quit"])){
    $_SESSION['gameSession'] = NULL;
    header('location: quiz');
}
if (isset($_GET["id_lobby"])){
    if(isset($_GET["playerAnswer"])){
        $_SESSION["gameSession"]->addPlayerAnswer($_SESSION["userId"], $_GET["playerAnswer"]);
        $_SESSION["gameSession"]->loadGame();
    }
    else{
        $game = new GameController($_GET["id_lobby"]);
        $game->addPlayer($_SESSION["userId"], 0);
        $game->loadGame();
    }
}
