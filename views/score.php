<?php 
showController("GameController");s
showView("header"); 
$game = $_SESSION['gameSession'];?>
<h3>The Quiz is finished !</h3>
<h2><?="You had a score of ".$game->getPlayerScore($_SESSION['userId'])." out of ".$game->getTotalNbQ()?></h2>

<form action="process_game" method="get"> <!--It's the same button that for rage quit-->
    <button class="btn btn-dark btn-lg mr" type="submit" name="quit">Quitter</button>
</form>

<?php showView("footer"); ?>