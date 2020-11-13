<?php

function emptyInputSignup($nom, $pnom, $email, $pwd)
{
    $result = true;
    if (empty($nom) || empty($pnom) || empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


function invalidEmail($email)
{
    $result = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


function uidExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) { //~ --> controller  :afficher l'error
        header('location: ..\view\testBack\testSignin.php?error=stmtfailed');
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

function createUser($conn, $nom, $pnom, $email, $pwd) // Au niiveau models
{
    $sql = "INSERT into users (userSurname,userName,userEmail,userPwd) VALUES (?,?,?,?) ;"; //Placeholders values
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ..\view\testBack\testSignin.php?error=stmtfailed');
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $nom, $pnom, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('location: ..\view\testBack\testSignin.php?error=none');
}


function emptyInputLogin($email, $password) //Not useful
{

    return empty($email) || empty($password);
}


function loginUser($conn, $email, $password)
{
    $uidExists = uidExists($conn, $email);

    if ($uidExists === false) {
        header('location:  ..\view\testBack\testloginSQL.php?error=wronglogin');
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header('location:  ..\view\testBack\testloginSQL.php?error=wronglogin'); //Au niveau controller
        exit();
    }

    session_start(); //TODO:A changer

    $_SESSION["userid"] = $uidExists["usersID"];
    $_SESSION["userName"] = $uidExists["usersName"];

    header('location: ..\views\index.php');
    exit();
}
