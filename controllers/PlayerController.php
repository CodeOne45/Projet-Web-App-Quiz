<?php

showController("LobbyController");

$lobby_ID = $_SESSION["lobby_Id"];
$lobby = new LobbyController();

$results = $lobby->get_players($lobby_ID);

echo "<table>";
foreach ($results as $quiz) :
    echo '<tr><td>' . $quiz["nickname"] . '</td></tr>';
endforeach;

echo "</table>";
