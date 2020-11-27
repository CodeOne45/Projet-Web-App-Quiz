<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Accueil</title>


  <!-- Bootstrap core CSS -->
  <link href="../views/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="../views/bootstrap/jumbotron.css" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="../public/index.php">QuizApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbars">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../public/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <?php
        //User loged in or not
        if (isset($_SESSION["userId"])) {
           echo '<li class="nav-item">
                    <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ' . $_SESSION["userName"] . '</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="../public/settings.php">Paramètres</a>
                              <a class="dropdown-item" href="../controllers/logoutController.php">logout</a>
                            </div>
                    </div>
                </li>';
        } else {
          echo '<li class="nav-item">
          <a class="nav-link" href="../public/login.php">Login</a>
        </li>';
          echo '<li class="nav-item">
        <a class="nav-link" href="../public/register.php">Sign In</a>
      </li>';
        }
        ?>

      </ul>
    </div>
  </nav>
  <!--On ne ferme pas la balise body-->
<script src="bootstrap/jquery-2.1.3.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
  <!--On ne ferme pas la balise html-->