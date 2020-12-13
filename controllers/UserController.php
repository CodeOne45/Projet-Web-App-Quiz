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
        $_SESSION["userMail"] = $results["email"];


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
        $requser = $phpprojectbd->prepare("SELECT * FROM user WHERE id = ?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
        if(isset($_POST['newusername']) AND !empty($_POST['newusername']) AND $_POST['newusername'] != $user['username']) {
           $newusername = htmlspecialchars($_POST['newusername']);
           $insertusername = $bphpprojectbd->prepare("UPDATE user SET username = ? WHERE id = ?");
           $insertusername->execute(array($newusername, $_SESSION['id']));
           header('Location: settings.php?id='.$_SESSION['id']);
        }
        if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email']) {
           $newemail = htmlspecialchars($_POST['newemail']);
           $insertemail = $phpprojectbd->prepare("UPDATE user SET mail = ? WHERE id = ?");
           $insertemail->execute(array($newemail, $_SESSION['id']));
           header('Location: settings.php?id='.$_SESSION['id']);
        }
        if(isset($_POST['newpwd']) AND !empty($_POST['newpwd']) AND $_POST['newpwd'] != $user['pwd']) {
            $newpwd = htmlspecialchars($_POST['newpwd']);
            $insertpwd = $phpprojectbd->prepare("UPDATE user SET mail = ? WHERE id = ?");
            $insertpwed->execute(array($newpwd, $_SESSION['id']));
            header('Location: settings.php?id='.$_SESSION['id']);
         }
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
