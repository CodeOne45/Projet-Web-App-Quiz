<?php
/**
 * Check game information and keep loading the page if game information after update are still valid
 */
require_once 'GameController.php';
session_start();

if (isset($_GET["quit"])) { //check if player has quit
    $_SESSION['gameSession'] = NULL;
    $_SESSION['lobby_Id'] = NULL;
    header('location: quiz');
}
if (isset($_GET["id_lobby"])) {
    if (isset($_GET["playerAnswer"])) { //check if the player has select a answer
        $_SESSION["gameSession"]->addPlayerAnswer($_SESSION["userName"], $_GET["playerAnswer"]);
        $_SESSION["gameSession"]->loadGame();
    } else {
        $game = new GameController($_GET["id_lobby"]); //Create a game session for the first loading
        $game->addPlayer($_SESSION["userName"], 0);
        $game->loadGame();
    }
}
