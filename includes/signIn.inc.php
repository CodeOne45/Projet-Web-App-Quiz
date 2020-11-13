<?php

if (isset($_POST["submit"])) {

    $nom = $_POST["name"];
    $pnom = $_POST["firstName"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'data.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignUp($nom, $pnom, $email, $pwd) !== false) {
        header('location: ..\views\register.php?error=emptyinput');
        exit();
    }

    if (invalidEmail($email) !== false) {
        header('location: ..\views\register.php?error=invalidemail');
        exit();
    }

    if (uidExists($connexion, $email) !== false) {
        header('location: ..\views\register.php?error=usernametaken');
        exit();
    }

    createUser($connexion, $nom, $pnom, $email, $pwd);
} else {
    header('location: ..\views\register.php');
}
