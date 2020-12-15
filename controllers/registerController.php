<?php
require_once 'UserController.php';
/**
 * Register a user if all input is valid
 */
if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    $user = new UserController();

    if ($user->emptyInputSignUp($username, $email, $pwd) !== false) {
        header('location: register?error=emptyInput');
        exit();
    }

    if ($user->invalidEmail($email) !== false) {
        header('location: register?error=invalidEmail');
        exit();
    }

    $user->registerUser($username, $email, $pwd);
} else {
    header('location: register?error=notWorking');
    exit();
}
