<?php showView("header"); ?>

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
        echo '<a class="btn btn-primary btn-lg mr" href="/quiz" role="button"> Select a Quiz ! &raquo;</a>'; //TODO 
      } else {
        echo '<a class="btn btn-primary btn-lg mr-3" href="/register" role="button">Sign In &raquo;</a>';
        echo '<a class="btn btn-primary btn-lg mr-3" href="/login" role="button">Login &raquo;</a>';
      }
      ?>
    </div>
  </div>

</main>

<?php showView("footer"); ?>