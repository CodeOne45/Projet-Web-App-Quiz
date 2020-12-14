<?php

showController("LobbyController");

$lobby_ID = $_SESSION["lobby_Id"];
$lobby = new LobbyController();

$results = $lobby->get_players($lobby_ID);


echo "<table>";
foreach ($results as $player) :
    if (isset($player["nickname"])) {
        echo '<tr><td>' . $player["nickname"] . '</td></tr>';
    }
endforeach;

echo "</table>";

$start = $lobby->get_lobby($lobby_ID);
$status = $start["start"];
if ($status === '1') {
    echo '<meta http-equiv="refresh" content="0;URL=game?id_lobby=' . $lobby_ID . '"/>';
}
