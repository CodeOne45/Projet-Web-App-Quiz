<?php
require_once 'UserController.php';

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
