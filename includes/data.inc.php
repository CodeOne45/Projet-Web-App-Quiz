<?php

//Info BD sqlite
session_start();
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpprojectbd";

$connexion = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$connexion) {
    die("Connection failed: " . mysqli_connect_error());
}

//Conection BD
/*try {
    $connect = new PDO("mysql:host=$serverName; dbname=$dBName", $dBUsername, $dBPassword);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Lorsqu'on clique sur login

    if (isset($_POST["login"])) {
        if (empty($_POST("email")) || empty($_POST("password"))) {
            $message = '<label> Uncomplit ...</label>';
        } else {
            //Request dans BD
            $query = "SELECT * FROM users WHERE email = :email AND password = :password";
            $statement = $connect->prepare($query);

            //Sauvgare de la requete
            $statement->execute(
                array(
                    'email' => $_POST["email"],
                    'password' => $_POST["password"]
                )
            );

            //Verification d'email & Mdp 
            $count = $statement->rowCount();

            if ($count > 0) { //Si > 0 --> Accés accordé
                $_SESSION["email"] = $_POST["email"];
                //On lance la session
                header("location:quiz.php");
            } else {
                $message = '<label> Wrong Data !!!</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
*/