<?php
require_once '../models/Database.php';

class Lobby
{
    public function random_ID(
        int $length = 64,
        string $keyspace = '0123456789'
    ): string {
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

    public  function setGame($ID, $QuizID)
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

    public function addPlayer($id_lobby, $nickname)
    {
        $sql = "INSERT INTO `player` (`id_game`, `nickname`, `score`) VALUES ('$id_lobby', '$nickname','0');"; //TODO use bind
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
            return false;
        }
    }

    public  function getPlayer($id_lobby)
    {
        $sql = "SELECT * FROM player WHERE id_game = '$id_lobby';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);

        $allPlayers = [];
        while ($row = $results->fetch_assoc()) {
            $allPlayers[] = $row;
        }
        $results->free();
        return $allPlayers;
    }
}