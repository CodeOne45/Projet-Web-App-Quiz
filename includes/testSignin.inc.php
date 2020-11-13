<?php

if (isset($_POST["submit"])) {

    $nom = $_POST["nom"];
    $pnom = $_POST["pnom"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'data.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($nom, $pnom, $email, $pwd) !== false) {
        header('location: ..\view\testBack\testSignIn.php?error=emptyinput');
        exit();
    }

    if (invalidEmail($email) !== false) {
        header('location: ..\view\testBack\testSignIn.php?error=invalidemail');
        exit();
    }


    if (uidExists($conn, $email) !== false) {
        header('location: ..\view\testBack\testSignIn.php?error=usernametaken');
        exit();
    }

    createUser($conn, $nom, $pnom, $email, $pwd);
} else {
    header('location: ..\view\testBack\testSignIn.php');
}
