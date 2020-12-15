<?php
include_once '../models/Lobby.php';

/**
 * Class LobbyController : For the management of the lobby page.
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
     * @return string return a random id for the lobby id
     * @throws Exception if the generation od random id fail
     */
    public function set_Lobby_ID()
    {
        return $this->lobby->random_ID();
    }

    /**
     * @param $id_lobby
     * @return array|false get all lobby's information in a associative array
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
     * indicates to the database that the play has started
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
     * @return array return all the players of a game in a associative array
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
     * @return array return information about a player
     */
    public function get_idPlayer($id_lobby, $id_user)
    {
        $result = $this->lobby->getIdPlayer($id_lobby, $id_user);
        if (!$result) {
            header('location: lobby?error=player_not_found');
            exit();
        }
        return $result;
    }

    /**
     * @param $id_lobby
     * @param $nickname
     * @param int|null $id_user it's null for a visitor
     */
    public function join_lobby($id_lobby, $nickname, ?int $id_user=NULL)
    {
        $this->lobby->addPlayer($id_lobby, $nickname, $id_user);
    }

    /**
     * update the player score (only for admin player)
     * @param $idPlayer
     * @param $score
     */
    public function update_Player($idPlayer, $score)
    {
        $this->lobby->updatePlayer($idPlayer, $score);
    }
}
