<?php
include_once '../models/Lobby.php';

/**
 * Class LobbyController
 */
class LobbyController
{
    private Lobby $lobby;

    /**
     * LobbyController constructor.
     */
    function __construct()
    {
        $this->lobby = new Lobby();
    }

    /**
     * @return string
     * @throws Exception
     */
    public function set_Lobby_ID()
    {
        return $this->lobby->random_ID();
    }

    /**
     * @param $id_lobby
     * @return array|false
     */
    public function get_lobby($id_lobby)
    {
        return $this->lobby->getLobby($id_lobby);
    }

    /**
     * @param $id_lobby
     * @param $QuizID
     */
    public function create_lobby($id_lobby, $QuizID)
    {
        $this->lobby->setGame($id_lobby, $QuizID);
    }

    /**
     * @param $id_lobby
     */
    public function launch_game($id_lobby)
    {
        $this->lobby->startGame($id_lobby);
    }

    /**
     * @param $id_lobby
     */
    public function delete_lobby($id_lobby)
    {
        $this->lobby->deleteLobby($id_lobby);
    }

    /**
     * @param $id_lobby
     * @return array
     */
    public function get_players($id_lobby)
    {
        $results = $this->lobby->getPlayers($id_lobby);
        if (!$results) {
            header('location: lobby?error=player_not_found');
            exit();
        }

        return $results;
    }

    /**
     * @param $id_lobby
     * @param $id_user
     * @return array
     */
    public function get_idPlayer($id_lobby, $id_user)
    {
        $result = $this->lobby->getIdPlayer($id_lobby, $id_user);
        if (!$result) {
            header('location: lobby?error=player_not_found'); //TODO
            exit();
        }
        return $result;
    }

    /**
     * @param $id_lobby
     * @param $nickname
     * @param int|null $id_user
     */
    public function join_lobby($id_lobby, $nickname, ?int $id_user=NULL)
    {
        $this->lobby->addPlayer($id_lobby, $nickname, $id_user);
    }

    /**
     * @param $idPlayer
     * @param $score
     */
    public function update_Player($idPlayer, $score)
    {
        $this->lobby->updatePlayer($idPlayer, $score);
    }
}
