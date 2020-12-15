<?php
require_once '../models/Database.php';

class Lobby
{
    /**
     * @param int $length
     * @param string $keyspace
     * @return string
     * @throws Exception
     */
    public function random_ID(int $length = 64, string $keyspace = '0123456789'): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length / 8; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        $_SESSION["lobby_Id"] = implode('', $pieces);
        return implode('', $pieces);
    }

    /**
     * @param $ID
     * @param $QuizID
     * @return bool
     */
    public function setGame($ID, $QuizID)
    {
        $sql = "INSERT INTO `game` (`id_game`, `id_quiz`, `date`, `start`) VALUES ('$ID', '$QuizID', current_timestamp(), '0');"; //TODO use bind
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
            return false;
        }
    }

    /**
     * @param $id_lobby
     * @return bool
     */
    public  function startGame($id_lobby)
    {
        $sql = "UPDATE `game` SET `start` = '1' WHERE `game`.`id_game` = '$id_lobby';"; //TODO use bind
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
            return false;
        }
    }

    /**
     * @param $id_lobby
     * @return array|false
     */
    public  function getLobby($id_lobby)
    {
        $sql = "SELECT * FROM game WHERE id_game = '$id_lobby';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);
        $row = $results->fetch_assoc(); //list

        $results->free();

        if ($row === NULL) {
            return false;
        }

        return $row;
    }

    /**
     * @param $Id
     * @return bool
     */
    public function deleteLobby($Id)
    {
        $sql = "DELETE FROM `game` WHERE `id_game` = $Id";
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
            return false;
        }
    }

    /**
     * @param $id_lobby
     * @param $nickname
     * @param int|null $id_user
     * @return bool
     */
    public function addPlayer($id_lobby, $nickname, ?int $id_user = NULL)
    {
        if ($id_user !== NULL)
            $sql = "INSERT INTO `player` (`id_game`, `nickname`, `id_user`, `score`) VALUES ('$id_lobby', '$nickname', '$id_user', '0');"; //TODO use bind
        else
            $sql = "INSERT INTO `player` (`id_game`, `nickname`, `score`) VALUES ('$id_lobby', '$nickname','0');"; //TODO use bind
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            error_log("Error: " . $sql . "<br>" . $stmt->error);
            return false;
        }
    }

    /**
     * @param $id_lobby
     * @return array
     */
    public  function getPlayers($id_lobby)
    {
        $sql = "SELECT * FROM player WHERE id_game = '$id_lobby';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);

        /*$allPlayers = [];
        while ($row = $results->fetch_assoc()) {
            $allPlayers[] = $row;
        }
        $results->free();
        return $allPlayers;*/
        return $results;
    }

    /**
     * @param $id_lobby
     * @param $id_user
     * @return array|null
     */
    public  function getIdPlayer($id_lobby, $id_user) //work only for admin player
    {
        $sql = "SELECT * FROM player WHERE id_game = '$id_lobby' AND id_user='$id_user';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);
        $row = $results->fetch_assoc();
        $results->free();
        return $row;
    }

    /**
     * @param $idPlayer
     * @param $score
     * @return bool
     */
    public  function updatePlayer($idPlayer, $score)
    {
        $sql = "UPDATE `player` SET `score` = '$score' WHERE id_player='$idPlayer';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
            return false;
        }
    }
}
