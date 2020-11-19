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
