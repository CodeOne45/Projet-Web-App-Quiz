<?php
include_once '../models/Users.php';

class UserController extends Users
{
    public function loginUser($email, $pwd)
    {
        $results = $this->getUser($email);
        $pwdHashed = $results["pwd"]; //

        $checkPwd = password_verify($pwd, $pwdHashed);

        if (!$checkPwd) {
            echo 'Wrong Password';
            exit();
        }

        echo 'Working';
    }

    public function registerUser($username, $email, $pwd)
    {
        $this->setUser($username, $email, $pwd);
    }
}
