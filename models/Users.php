<?php
require_once '../models/Database.php';
class Users
{
    protected function getUser($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email';";
        $stmt = Database::getInstance();

        $results = $stmt->query($sql);
        $row = $results->fetch_assoc();

        $results->free();

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
            error_log("Error: " . $sql . "<br>" . $stmt->error);
            return false;
        }
    }

    protected function updateUser($username, $useremail, $newpwd, $currentemail){
        $sql = "UPDATE user SET username = '$username', email = '$useremail', pwd = '$newpwd' WHERE email = '$currentemail'";
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            error_log("Error: " . $sql . "<br>" . $stmt->error);
            return false;
        }
    }
}
