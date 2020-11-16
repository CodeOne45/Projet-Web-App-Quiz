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
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/jumbotron.css" rel="stylesheet">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">QuizApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbars">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
              <a class="nav-link" href="profile.php">' . $_SESSION["userName"] . '</a>
            </li>';
          echo '<li class="nav-item">
              <a class="nav-link" href="..\includes\logout.inc.php">Logout</a>
            </li>';
        } else {
          echo '<li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>';
          echo '<li class="nav-item">
        <a class="nav-link" href="register.php">Sign In</a>
      </li>';
        }
        ?>

      </ul>
    </div>

  </nav>

</html>