<?php
include_once '../models/Users.php';

/**
 * Class UserController : for the management of user
 */
class UserController extends Users
{
    /**
     * Check if log is valid and set user sessions if that is the case, else send to login page with a error message
     * @param $email
     * @param $pwd
     */
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

        session_start();

        $_SESSION["userId"] = $results["id_user"];
        $_SESSION["userName"] = $results["username"];
        $_SESSION["userMail"] = $results["email"];

        header('location: index');
        exit();
    }

    /**
     * Check is user's inputs are valid, if yes, register the user
     * @param $username
     * @param $email
     * @param $pwd
     */
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

    /**
     * Update a user if his log are valid
     * @param $username     "new userName    (can be the same as the last one)"
     * @param $useremail    "new email       (can be the same as the last one)"
     * @param $newpwd       "new password    (can be the same as the last one)"
     * @param $currentemail "current email of the user"
     * @param $currentpwd   "current password of the user"
     */
    public function update_User($username, $useremail, $newpwd, $currentemail, $currentpwd)
    {
        $results = $this->getUser($currentemail);
        if (!$results) {
            header("location: settings?error=$currentemail");
            exit();
        }

        $pwdHashed = $results["pwd"];
        $checkPwd = password_verify($currentpwd, $pwdHashed);

        if ($checkPwd) {
            $isUpdate= $this->updateUser($username, $useremail, $newpwd, $currentemail);
            if($isUpdate){
                session_start();
                $_SESSION["userName"] = $username;
                $_SESSION["userMail"] = $useremail;
                header('location: settings?Update=OK');
                exit();
            }
            header('location: settings?Update=Fail');
            exit();
        }
        header('location: settings?error=wrongPwd');
        exit();
    }

    /**
     * @param $email
     * @param $pwd
     * @return bool true if one of Login inputs are empty
     */
    public function emptyInputLogin($email, $pwd)
    {
        return empty($email) || empty($pwd);
    }

    /**
     * @param $username
     * @param $email
     * @param $pwd
     * @return bool true if one of SignUp inputs are empty
     */
    public function emptyInputSignUp($username, $email, $pwd)
    {
        return (empty($username) || empty($email) || empty($pwd));
    }

    /**
     * @param $email
     * @return bool true if the email is in a invalid format
     */
    public function invalidEmail($email)
    {
        return (!filter_var($email, FILTER_VALIDATE_EMAIL));
    }
}
