<?php
require_once '../models/Database.php';
class Users
{
    protected function getUser($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);
        $row = $results->fetch_assoc(); //list

        $results->free();
        $stmt->close();

        if ($row === NULL) {
            return false;
        }

        return $row;
    }

    protected function setUser($username, $email, $pwd)
    {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username,email,pwd) VALUES ('$username','$email','$hashedPwd');"; //TODO use bind
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
        }

        $stmt->close();
    }

    protected function emptyInputLogin($email, $pwd) //Not useful
    {
        return empty($email) || empty($pwd);
    }
}
