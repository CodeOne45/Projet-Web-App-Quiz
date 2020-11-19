<?php
include_once 'header.php';
?>

<main role="main">

  <div class="jumbotron">
    <div class="container">
      <?php
      if (isset($_SESSION["userId"])) {
        echo "<h1> Hello " . $_SESSION["userName"] . " !</h1>";
      }
      ?>
      <h1 class="display-5">Welcome to Quiz App the online quiz to play with friends</h1>
      <p>Come have fun and test your knowledge and challenge your friends in real time.</p>
      <p>
        <ul>
          <li>Questions on various topics</li>
          <li>Learn while having fun</li>
          <li>Test your general knowledge with your friends</li>
        </ul>
      </p>
      <?php
      if (isset($_SESSION["userId"])) {
        echo '<a class="btn btn-primary btn-lg" href="quiz.php" role="button">Créer une partie ! &raquo;</a>';
      } else {
        echo '<a class="btn btn-primary btn-lg" href="register.php" role="button">Sign In &raquo;</a>';
        echo '<a class="btn btn-primary btn-lg" href="login.php" role="button">Login &raquo;</a>';
      }
      ?>
    </div>
  </div>

</main>

<?php
include_once 'footer.php';
?>