<?php showView("header"); ?>

<body>
    <?php
    $lobbyId = $_GET["id_lobby"];

    if (!$lobbyId) {
        echo "<h1>Quiz room id : " . $_GET["id_lobby"] . "</h1>";
    } else {
    ?>
        <center>

            <h2>Game</h2>
            <div id="search_bar">
                <!-- TODO : Relier à la db -->
                <form action="quiz.php" method="get">
                    <input type="text" name="search" placeholder="Search Quiz...">
                    <button type="submit">Search</button>
                </form>
                <br>
            </div>

            <div id="Question" class="numerodelaquestion" style="padding-left : 85%; ">
                2/4
            </div>

            <div>
                <article class="game_box">


                    <h2 class="text-center">Game</h2>

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

                        <section class="col-sm-10 col-md-8">

                            <div class="progress w-50">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="game_box">
                                <img src="public/Images/HarryPotter.jpg" alt="Photo de harry potter">
                                <div class="quiz_question">
                                    <p>Bla bla bla ?</p>
                                </div>
                </article>
            </div>

            <div class="answer_box">
                <table>
                    <tr>
                        <th><a href="game">Reponse 1</a></th>
                        <th><a href="game">Reponse 2</a></th>
                    </tr>
                    <tr>
                        <th><a href="game">Reponse 3</a></th>
                        <th><a href="game">Reponse 4</a></th>
                    </tr>
                </table>
                <br>
                <button type="button" onclick="location.href='quiz'">Quitter le jeu</button>
            </div>


        </center>
        </div>

        <div class="answer_box">
            <table>
                <tr>
                    <th><a class="btn btn-primary btn-md mr" href="quiz" role="button">Reponse 1</a></th>
                    <th><a class="btn btn-danger btn-md mr" href="quiz" role="button">Reponse 2</a></th>
                </tr>
                <tr>
                    <th><a class="btn btn-warning btn-md mr" href="quiz" role="button">Reponse 3</a></th>
                    <th><a class="btn btn-success btn-md mr" href="quiz" role="button">Reponse 4</a></th>
                </tr>
            </table>
            <br>
            <a class="btn btn-dark btn-lg mr" href="quiz" role="button">Quitter le jeu</a>
        </div>


        </section>

        <div class="col-md-2">
            <div class="row">
                <aside class="col-md-12">

                    <div class="players">
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
                    </div>
                </aside>
            </div>
        </div>
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
<<<<<<< HEAD <form name="chronoForm" style="padding-left : 80% ; margin-top: 10%;">
    <input type="text" name="chronotime" id="chronotime" value="00:00" />
    <input type="button" name="startstop" value="start!" onClick="chronoStart()" style="visibility: hidden;" />
    <input type="button" name="reset" value="reset!" onClick="chronoReset()" style="visibility: hidden;" />
    </form>
<?php
    }
?>



=======
>>>>>>> 20318f739c49c67d317d87ef668c11e400e894bb