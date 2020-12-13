<?php showView("header"); ?>

<h2>Quiz List Page</h2>
<div id="search_bar">
    <form action="quiz" method="get">
        <input type="text" name="search" placeholder="Search Quiz...">
        <button class="btn btn-secondary" type="submit">Search</button>
    </form>
</div>

<?php
showController("QuizController"); //TODO line 12-16 to optimize
$filter = isset($_GET['search']) ? $_GET['search'] : null;
$quizControl = new QuizController($filter);
$allQuiz = $quizControl->getAllQuizs();
if (count($allQuiz) == 0) {
    echo "Not Quiz for your search ! Try another search.";
} else {

    foreach ($allQuiz as $quiz) : ?>
        <div class="row" style="display:inline-block">
            <div class="col-sm-6">
                <div class="card" style="width: 18rem;">
        
                    <div class="card-body">
                        <h5 class="card-title"><?= $quiz['name'] ?></h5>
                        <p class="card-text"><?= $quiz['description'] ?></p>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Difficulty : <?= $quiz['level'] ?></li>
                            <li class="list-group-item">Number of question : <?= $quiz['nbQuestion'] ?></li>
                            <li class="list-group-item">Theme(s) : <?= $quiz['themes'] ?></li>
                        </ul>


                        <form action="lobby" method="get">
                            <input type="hidden" name="id_quiz" value=<?= $quiz['id_quiz'] ?>>
                            <button class="btn btn-primary" type="submit">Create Game</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
<?php endforeach;
} ?>
<?php showView("footer"); ?>