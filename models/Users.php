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

        if ($row === NULL) {
            return false;
        }

        return $row;
    }

    protected function setUser($username, $email, $pwd)
    {
        if($this->getUser($email) !== false)
            return false;

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username,email,pwd) VALUES ('$username','$email','$hashedPwd');"; //TODO use bind
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
            return false;
        }
    }
}
