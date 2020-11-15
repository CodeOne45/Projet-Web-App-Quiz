<?php
include_once 'header.php';
?>
<h2>Quiz List Page</h2>
<div id="search_bar"> <!-- TODO : Relier à la db -->
    <h3>======== Search bar ======== </h3>
    <form action="quiz.php" method="get">
        <input type="text" name="search" placeholder="Search Quiz...">
        <button type="submit">Search</button>
    </form>
</div>
<div class="quiz_box"> <!-- TODO : Un foreach pour chaque quiz qui correspond à la recherche -->
    <h3>*Quiz's Title*</h3>
    <article class="quiz_description">
        <h4>*Quiz's description*</h4>
        <p>Bla bla bla</p>
        <p>Bla bla bla</p>
        <p>Bla bla bla</p>
    </article>
    <article class="quiz_difficulty">
        <h4>*Quiz's Difficulty*</h4>
        <p>*Number of question in the Quiz*</p>
        <p>Themes : *Themes1*, *Themes2*, ...</p>
    </article>
    <button type="button" onclick="location.href='game.php'">Jouez</button>
</div>

<?php
include_once 'footer.php';
?>