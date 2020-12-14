<?php
include_once '../models/Lobby.php';

class LobbyController
{
    private Lobby $lobby;

    function __construct()
    {
        $this->lobby = new Lobby();
    }

    public function set_Lobby_ID()
    {
        return $this->lobby->random_ID();
    }
    public function get_lobby($id_lobby)
    {
        return $this->lobby->getLobby($id_lobby);
    }

    public function create_lobby($id_lobby, $QuizID)
    {
        $this->lobby->setGame($id_lobby, $QuizID);
    }

    public function launch_game($id_lobby)
    {
        $this->lobby->startGame($id_lobby);
    }

    public function delete_lobby($id_lobby)
    {
        $this->lobby->deleteLobby($id_lobby);
    }

    public function get_players($id_lobby)
    {
        $results = $this->lobby->getPlayers($id_lobby);
        if (!$results) {
            header('location: lobby?error=player_not_found');
            exit();
        }

        return $results;
    }

    public function get_idPlayer($id_lobby, $id_user)
    {
        $result = $this->lobby->getIdPlayer($id_lobby, $id_user);
        if (!$result) {
            header('location: lobby?error=player_not_found'); //TODO
            exit();
        }
        return $result;
    }

    public function join_lobby($id_lobby, $nickname, ?int $id_user=NULL)
    {
        $this->lobby->addPlayer($id_lobby, $nickname, $id_user);
    }

    public function update_Player($idPlayer, $score)
    {
        $this->lobby->updatePlayer($idPlayer, $score);
    }
}
