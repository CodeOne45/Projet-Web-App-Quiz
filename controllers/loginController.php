<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once '../models/Database.php';
    require_once '../models/functions.php';
    $connexion = Database::getInstance();

    if (emptyInputLogin($email, $pwd)) {
        header('location: ../public/login.php?error=emptyInput');
        exit();
    }

    loginUser($connexion, $email, $pwd);
} else {
    header('location: ../public/login.php?error=notWorking');
    exit();
}
