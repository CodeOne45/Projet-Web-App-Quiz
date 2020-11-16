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
<<<<<<< HEAD
    $sql = "SELECT * FROM users WHERE email = '$email';";
=======
    $sql = 'SELECT * FROM users WHERE email = $email;';
    var_dump($_POST);
>>>>>>> aad02761984bce1848bc9cb5332f23fee490cab4
    $stmt = mysqli_stmt_init($connexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) { //~ --> controller  :afficher l'error
        header('location: ..\views\register.php?error=stmtFailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    //$test = mysqli_stmt_error($stmt);

    //echo 'mysqli_stmt_error($stmt)';
    //debug_to_console(mysqli_stmt_error($stmt));
    echo '<script>
    console.log(<?= json_encode($stmt); ?>);
</script>';
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);

    if ($row === NULL) {
        return false;
    }

    return $row;
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
    if (!$uidExists) {
        header('location: ..\views\register.php?error=wrongLogin');
        exit();
    }

    $pwdHashed = $uidExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if (!$checkPwd) {
        header('location: ..\views\login.php?error=wrongPwd'); //Au niveau controller
        exit();
    }

    header('location: ..\views\login.php?error=none'); //Au niveau controller


    session_start(); //TODO:A changer

    $_SESSION["userId"] = $uidExists["id_user"];
    $_SESSION["userName"] = $uidExists["username"];

    header('location: ..\views\index.php');
    exit();
}
