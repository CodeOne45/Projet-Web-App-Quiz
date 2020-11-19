<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];


    require_once 'data.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email, $pwd)) {
        header('location: ..\views\login.php?error=emptyInput');
        exit();
    }

    loginUser($connexion, $email, $pwd);
} else {
    header('location: ..\views\login.php\error=notWorking');
    exit();
}
