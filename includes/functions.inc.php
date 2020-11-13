<?php

function emptyInputSignUp($name, $fName, $email, $pwd)
{
    return (empty($name) || empty($fName) || empty($email) || empty($pwd));
}

function invalidEmail($email)
{
    return (!filter_var($email, FILTER_VALIDATE_EMAIL));
}

function uidExists($connexion, $email)
{
    $sql = "SELECT * FROM users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($connexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) { //~ --> controller  :afficher l'error
        header('location: ..\views\register.php?error=stmtFailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($connexion, $name, $fName, $email, $pwd) // Au niiveau models
{
    $sql = "INSERT into users (userSurname,userName,userEmail,userPwd) VALUES (?,?,?,?) ;"; //Placeholders values
    $stmt = mysqli_stmt_init($connexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ..\views\register.php?error=stmtFailed');
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $fName, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('location: ..\views\register.php?error=none');
}

function emptyInputLogin($email, $pwd) //Not useful
{
    return empty($email) || empty($pwd);
}

function loginUser($connexion, $email, $pwd)
{
    $uidExists = uidExists($connexion, $email);

    if ($uidExists === false) {
        header('location: ..\views\register.php?error=wrongLogin');
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header('location: ..\views\register.php?error=wrongLogin'); //Au niveau controller
        exit();
    }

    session_start(); //TODO:A changer

    $_SESSION["userId"] = $uidExists["usersID"];
    $_SESSION["userName"] = $uidExists["usersName"];

    header('location: ..\views\index.php');
    exit();
}
