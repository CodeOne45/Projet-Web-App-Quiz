<?php
include_once '../models/Users.php';

class UserController extends Users
{
    public function loginUser($email, $pwd)
    {
        if ($this->emptyInputLogin($email, $pwd)) {
            header('location: ../public/login.php?error=emptyInput');
            exit();
        }

        $results = $this->getUser($email);
        if (!$results) {
            header('location: ../public/register.php?error=wrongLogin');
            exit();
        }

        $pwdHashed = $results["pwd"];

        $checkPwd = password_verify($pwd, $pwdHashed);

        if (!$checkPwd) {
            header('location: ../public/login.php?error=wrongPwd');
            exit();
        }

        header('location: ../public/login.php?error=none');

        session_start(); // to modify

        $_SESSION["userId"] = $results["id_user"];
        $_SESSION["userName"] = $results["username"];

        header('location: ../public/index.php');
        exit();
    }

    public function registerUser($username, $email, $pwd)
    {
        if ($this->setUser($username, $email, $pwd)) {
            header('location: ../public/register.php?error=none');
            exit();
        } else {
            header('location: ../public/register.php?error=stmtFailed');
            exit();
        }
    }
}
