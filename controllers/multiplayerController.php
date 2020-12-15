<?php
session_start();
/**
 *
 */
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
    echo '<form action="process_game" method="get">';
    echo '<input type="hidden" name="id_lobby" value=' . $lobby_ID . '>';
    echo '<button class="btn btn-primary btn-sm mr" type="submit"> Game is ready !</button>';
    echo '</form>';
}
