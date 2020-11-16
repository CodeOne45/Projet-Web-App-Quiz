<?php

function emptyInputSignUp($username, $email, $pwd)
{
    return (empty($username) || empty($email) || empty($pwd));
}

function invalidEmail($email)
{
    return (!filter_var($email, FILTER_VALIDATE_EMAIL));
}

function uidExists($connexion, $email)
{
    $sql = 'SELECT * FROM users WHERE email = $email;';
    var_dump($_POST);
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

function createUser($connexion, $username, $email, $pwd) // Au niveau models
{
    $sql = 'INSERT INTO users (username,email,pwd) VALUES (?,?,?);'; //Placeholders values
    $stmt = mysqli_stmt_init($connexion);
    echo "<script>console.log('Debug Objects: " . "$username, $email, $pwd " . "' );</script>";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ..\views\register.php?error=stmtFailed');
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
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

    $pwdHashed = $uidExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header('location: ..\views\register.php?error=wrongLogin'); //Au niveau controller
        exit();
    }

    session_start(); //TODO:A changer

    $_SESSION["userId"] = $uidExists["id_user"];
    $_SESSION["userName"] = $uidExists["username"];

    header('location: ..\views\index.php');
    exit();
}
