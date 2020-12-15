<?php
require_once '../models/Database.php';

/**
 * Class Lobby : Use the Database class to manage lobby page information
 */
class Lobby
{
    /**
     * Generate a random id
     * @param int $length identifier size
     * @param string $keyspace possible symbol in the id
     * @return string return the random id generated
     * @throws Exception if identifier size is less than 1
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
     * Save the game in the database
     * @param $ID  "Admin id. it corresponds to the creator of the game"
     * @param $QuizID
     * @return bool true if the save has been done else false with a message in error_log()
     */
    public function setGame($ID, $QuizID)
    {
        $sql = "INSERT INTO `game` (`id_game`, `id_quiz`, `date`, `start`) VALUES ('$ID', '$QuizID', current_timestamp(), '0');";
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            error_log("Error: " . $sql . "<br>" . $stmt->error) ;
            return false;
        }
    }

    /**
     * update the database when the game start
     * @param $id_lobby
     * @return bool true if update has been done else false with a message in error_log()
     */
    public  function startGame($id_lobby)
    {
        $sql = "UPDATE `game` SET `start` = '1' WHERE `game`.`id_game` = '$id_lobby';";
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
     * @return array|false return game info which matches id_lobby
     */
    public  function getLobby($id_lobby)
    {
        $sql = "SELECT * FROM game WHERE id_game = '$id_lobby';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);
        $row = $results->fetch_assoc();

        $results->free();

        if ($row === NULL) {
            return false;
        }

        return $row;
    }

    /**
     * @param $Id
     * @return bool true if delete has been done else false with a message in error_log()
     */
    public function deleteLobby($Id)
    {
        $sql = "DELETE FROM `game` WHERE `id_game` = $Id";
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
     * @param $nickname
     * @param int|null $id_user the user_id if the player is a admin, null for a visitor
     * @return bool true if query has been done else false with a message in error_log()
     */
    public function addPlayer($id_lobby, $nickname, ?int $id_user = NULL)
    {
        if ($id_user !== NULL)
            $sql = "INSERT INTO `player` (`id_game`, `nickname`, `id_user`, `score`) VALUES ('$id_lobby', '$nickname', '$id_user', '0');";
        else
            $sql = "INSERT INTO `player` (`id_game`, `nickname`, `score`) VALUES ('$id_lobby', '$nickname','0');";
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
     * @return array return all information in an associative array about the players of a game from the database
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
     * @return array|null return all information in an associative array about the player from the database
     */
    public  function getIdPlayer($id_lobby, $id_user) // only for admin player
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
     * @return bool true if update has been done else false with a message in error_log()
     */
    public  function updatePlayer($idPlayer, $score) /// only for admin players
    {
        $sql = "UPDATE `player` SET `score` = '$score' WHERE id_player='$idPlayer';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            error_log("Error: " . $sql . "<br>" . $stmt->error);
            return false;
        }
    }
}
