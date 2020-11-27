<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once '../models/Database.php';
    require_once '../models/functions.php';
    $connexion = Database::getInstance();

    if (emptyInputSignUp($username, $email, $pwd) !== false) {
        header('location: ../public/register.php?error=emptyInput');
        exit();
    }

    if (invalidEmail($email) !== false) {
        header('location: ../public/register.php?error=invalidEmail');
        exit();
    }

    if (uidExists($connexion, $email) !== false) {
        header('location: ../public/register.php?error=usernameTaken');
        exit();
    }

    createUser($connexion, $username, $email, $pwd);
} else {
    header('location: ../public/register.php');
}
