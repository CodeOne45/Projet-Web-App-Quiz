<?php
showController("GameController");
showView("header");
if (isset($_SESSION['gameSession']) == false or isset($_GET["id_lobby"]) == false) {
    echo "GAME NOT SET"; //TODO Create a game not set page
    exit;
}
$lobby = new LobbyController();
$lobby->launch_game($_GET["id_lobby"]);
$game = $_SESSION['gameSession'];
$currentQ = $game->getQuestions()[$game->getCurrentQNb()];
?>

<body>
    <h2 class="text-center"><?= "QUIZ : " . $game->getQuiz()['name']; ?></h2>
    <div><?= "<h4>Quiz room id : " . $_GET["id_lobby"] . "</h4>" ?></div>
    <div class="row">

        <div class="col-sm-2">
            <div class="row">
                <aside class="col-md-12">
                    <form name="chronoForm">
                        <input type="text" name="chronotime" id="chronotime" value="00:00" />
                        <input type="button" name="startstop" value="start!" onClick="chronoStart()" style="visibility: hidden;" />
                        <input type="button" name="reset" value="reset!" onClick="chronoReset()" style="visibility: hidden;" />
                    </form>
                </aside>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style=<?= "width:" . $game->getProgress() . "%" ?> aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <aside>
                <table>
                    <tr>
                        <th>Player 1</th>
                    </tr>
                    <tr>
                        <th>Player 2</th>
                    </tr>
                    <th>Player 3</th>
                    </tr>
                </table>
            </aside>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1 col-md-2"></div>

            <section class="col-sm-10 col-md-8">
                <h3>
                    <?php   $numQ = $game->getCurrentQNb()+1; 
                            echo "Question n°".$numQ; ?>
                </h3>
                <div class="game_box">
                    <?php if(isset($currentQ["imageURL"])):?>
                        <img src=<?="public/images/".$currentQ["imageURL"].".jpg"?> alt=<?="image : ".$currentQ["imageURL"].".jpg"?>>
                    <?php endif;?>
                    <div class="quiz_question">
                        <p><?=$currentQ["text"]?></p>
                    </div>
                </div>

                <?php 
                $proposalAnswer = $game->getQAnswers($currentQ["id_question"]);
                shuffle($proposalAnswer);
                foreach($proposalAnswer as $answer):?>
                    <form action="process_game" method="get">
                        <input type="hidden" name="id_lobby" value="<?=$game->getLobbyId()?>">
                        <input type="hidden" name="playerAnswer" value="<?=$answer?>">
                        <button class="btn btn-primary btn-md mr" type="submit"><?=$answer?></button>
                    </form>
                <?php endforeach;?>
                <br>
                <form action="process_game" method="get">
                    <button class="btn btn-dark btn-lg mr" type="submit" name="quit">Rage Quit</button>
                </form>
            </section>
            
        </div> 	
</body>

<?php showView("footer"); ?>

<script language="JavaScript">
    var startTime = 0
    var start = 0
    var end = 0
    var diff = 0
    var timerID = 0
    window.onload = chronoStart;

    function chrono() {
        end = new Date()
        diff = end - start
        diff = new Date(diff)
        var sec = diff.getSeconds()
        var min = diff.getMinutes()
        if (min < 10) {
            min = "0" + min
        }
        if (sec < 10) {
            sec = "0" + sec
        }

        document.getElementById("chronotime").value = min + ":" + sec
        timerID = setTimeout("chrono()", 10)
    }

    function chronoStart() {
        document.chronoForm.startstop.value = "stop!"
        document.chronoForm.startstop.onclick = chronoStop
        document.chronoForm.reset.onclick = chronoReset
        start = new Date()
        chrono()
    }

    function chronoContinue() {
        document.chronoForm.startstop.value = "stop!"
        document.chronoForm.startstop.onclick = chronoStop
        document.chronoForm.reset.onclick = chronoReset
        start = new Date() - diff
        start = new Date(start)
        chrono()
    }

    function chronoReset() {
        document.getElementById("chronotime").value = "00:00"
        start = new Date()
    }

    function chronoStopReset() {
        document.getElementById("chronotime").value = "00:00"
        document.chronoForm.startstop.onclick = chronoStart
    }

    function chronoStop() {
        document.chronoForm.startstop.value = "start!"
        document.chronoForm.startstop.onclick = chronoContinue
        document.chronoForm.reset.onclick = chronoStopReset
        clearTimeout(timerID)
    }
</script>