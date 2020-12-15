<?php
require_once '../models/Database.php';

/**
 * Class Users
 */
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

    /**
     * @param $username
     * @param $email
     * @param $pwd
     * @return bool
     */
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

    /**
     * @param $username
     * @param $useremail
     * @param $newpwd
     * @param $currentemail
     * @return bool
     */
    protected function updateUser($username, $useremail, $newpwd, $currentemail){
        $hashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET username = '$username', email = '$useremail', pwd = '$hashedPwd' WHERE email = '$currentemail'";
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            return true;
        } else {
            error_log("Error: " . $sql . "<br>" . $stmt->error);
            return false;
        }
    }
}
