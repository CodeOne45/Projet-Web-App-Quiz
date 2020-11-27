<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'data.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignUp($username, $email, $pwd) !== false) {
        header('location: ..\views\register.php?error=emptyInput');
        exit();
    }

    if (invalidEmail($email) !== false) {
        header('location: ..\views\register.php?error=invalidEmail');
        exit();
    }

    if (uidExists($connexion, $email) !== false) {
        header('location: ..\views\register.php?error=usernameTaken');
        exit();
    }

    createUser($connexion, $username, $email, $pwd);
} else {
    header('location: ..\views\register');
}
