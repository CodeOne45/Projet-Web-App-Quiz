<?php
require_once 'UserController.php';

/**
 * update user information if his log is valid, else send him back to settings page with a error message
 */
if(isset($_POST["update"])) {
    $newEmail = $_POST["userEmail"];
    $newName = $_POST["userName"];
    session_start();
    $currentEmail = $_SESSION['userMail'];
    $currentpwd = $_POST["currentPwd"];
    $newpwd = $_POST["newPwd"];

    $user = new UserController();

    $user->update_User($newName, $newEmail, $newpwd, $currentEmail, $currentpwd);
}

/**
 * log the user if his login is valid, else send him back to login page with a error message
 */
if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    $user = new UserController();
    if ($user->emptyInputLogin($email, $pwd)) {
        header('location: login?error=emptyInput');
        exit();
    }

    $user->loginUser($email, $pwd);
} else {
    header('location: login?error=notWorking');
    exit();
}


