<?php
include_once '../models/Users.php';

class UserController extends Users
{
    public function loginUser($email, $pwd)
    {
        $results = $this->getUser($email);
        if (!$results) {
            header('location: login?error=wrongLogin');
            exit();
        }

        $pwdHashed = $results["pwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if (!$checkPwd) {
            header('location: login?error=wrongPwd');
            exit();
        }

        session_start(); // TODO to modify

        $_SESSION["userId"] = $results["id_user"];
        $_SESSION["userName"] = $results["username"];

        header('location: index');
        exit();
    }

    public function registerUser($username, $email, $pwd)
    {
        if ($this->getUser($email) !== false) {
            header('location: register?error=emailAlreadyUsed');
            exit();
        } elseif ($this->setUser($username, $email, $pwd) === true) {
            header('location: register?error=none');
            exit();
        } else {
            header('location: register?error=stmtFailed');
            exit();
        }
    }

    public function updateUser()
    {
        //TODO
    }

    public function emptyInputLogin($email, $pwd)
    {
        return empty($email) || empty($pwd);
    }

    public function emptyInputSignUp($username, $email, $pwd)
    {
        return (empty($username) || empty($email) || empty($pwd));
    }

    public function invalidEmail($email)
    {
        return (!filter_var($email, FILTER_VALIDATE_EMAIL));
    }
}
