<?php
include_once 'header.php';
?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">QuizApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbars">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">A propos de nous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Se connecter</a>
      </li>
    </ul>
  </div>
  
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-5">Bienvenue sur Quiz App le jeu de quiz en ligne !</h1>
      <p>Venez vous amuser et tester votre culture et défiez vos amis en temps réel</p>
      <p>
        <ul>
            <li>Des questions sur des thèmes variés</li>
            <li>Apprendre en s'amusant</li>
            <li>Tester votre culture générale avec vos amis</li>
        </ul></p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">S'inscrire &raquo;</a>
      <a class="btn btn-primary btn-lg" href="#" role="button">Se connecter &raquo;</a></p>
    </div>
  </div>

    <hr>

</main>

<?php
include_once 'footer.php';
?>