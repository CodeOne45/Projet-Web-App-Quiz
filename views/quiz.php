<?php
include_once 'header.php';
include_once '../models/QuizModel.php';
?>
<h2>Quiz List Page</h2>
<div id="search_bar"> <!-- TODO : Relier à la db -->
    <h3>======== Search bar ======== </h3>
    <form action="quiz.php" method="get">
        <input type="text" name="search" placeholder="Search Quiz...">
        <button type="submit">Search</button>
    </form>
</div>
<?php
$quizData = new QuizModel();
$filter = "";
$allQuiz = $quizData->getAllQuizs($filter);
if (count($allQuiz) == 0) {
    echo "";
}
else
    foreach($allQuiz as $quiz): ?>
        <div class="quiz_box"> <!-- TODO : Un foreach pour chaque quiz qui correspond à la recherche -->
            <h3><?=$quiz['name']?></h3>
            <article class="quiz_description">
                <h4>Description*</h4>
                <p><?=$quiz['description']?></p>
            </article>
            <article class="quiz_difficulty">
                <h4>*Quiz's Difficulty*</h4>
                <p>Number of question in the Quiz : <?=$quiz['nbQuestion']?></p>
                <p>Themes : *Themes1*, *Themes2*, ...</p>
            </article>
            <button type="button" onclick="location.href='game.php'">Jouez</button> //
        </div>
    <?php endforeach;?>
<?php
include_once 'footer.php';
?>