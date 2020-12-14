<?php showView("header"); ?>

<main role="main">
    <div class="jumbotron">
        <div class="container w-100">
            <h1> Lobby </h1>
            <div class="row">
                <?php
                showController("LobbyController");
                $lobby = new LobbyController();
                if (isset($_SESSION["userId"])) {

                    $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
                    if ($pageRefreshed == 1) {
                        $lobby->delete_lobby($_SESSION["lobby_Id"]);
                    }

                    if (isset($_GET["id_quiz"]) == false) {
                        echo "Lobby not set";
                        exit;
                    }

                    $quizId = $_GET["id_quiz"];
                    $lobby_ID = $lobby->set_Lobby_ID();
                    $_SESSION["lobby_Id"] = $lobby_ID;

                    $lobby->create_lobby($lobby_ID, $quizId);
                    $lobby->join_lobby($lobby_ID, $_SESSION['userName'], $_SESSION['userId']);
                ?>
                    <div class="col-sm">
                        Quiz informations
                    </div>
                    <div class="col-sm">
                        Single Player

                        <form action="process_game" method="get">
                            <input type="hidden" name="id_lobby" value=<?= $lobby_ID ?>>
                            <button class="btn btn-primary btn-sm mr" type="submit"> Launch Single Player</button>
                        </form>

                    </div>
                    <div class="col-sm">
                        Multiplayer (Share this URL to your friends !)
                        <?php

                        echo '<input type="text" class="form-control" value="http://localhost/Projet-Web-App-Quiz/visitor?id_lobby='  . $lobby_ID . '" readonly="readonly" id="lobby_id_cp">';
                        ?>
                        <button class="btn btn-primary btn-sm mr" onclick="copyJS()"> Copy URL</button>
                        <form action="process_game" method="get">
                            <input type="hidden" name="id_lobby" value=<?= $lobby_ID ?>>
                            <button class="btn btn-primary btn-sm mr" type="submit"> Launch Multiplayer</button>
                        </form>

                        List of players :

                    <?php

                } elseif (!empty($_SESSION["lobby_Id"])) {
                    $lobbyId = $_SESSION["lobby_Id"];
                    $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
                    if ($pageRefreshed == 1) {
                    } else {
                        $nickname =  $_GET["nickname"];
                        $lobby->join_lobby($lobbyId, $nickname);
                        $_SESSION["userName"] = $nickname;
                        showController("GameController");
                    }

                    echo 'Joined the lobby, ' . $_SESSION["userName"];
                    echo 'Waiting admin to launch the quiz! ';
                    echo 'List of players';
                } else {
                    echo 'Please login and chose a quiz to create a lobby !';
                }
                    ?>
                    </div>
                    <div class="container">
                        <div class="anyClass"></div>
                    </div>
                    <script>
                        //Check in DB if a player has koined the lobby ervey one second
                        setInterval(runFunction, 1000);

                        function runFunction() {
                            $.get("process_multyplayer", {
                                    lobby: '<?php echo $lobbyId ?>'
                                },
                                function(data, status) {
                                    document.getElementsByClassName('anyClass')[0].innerHTML = data;
                                }
                            )
                        }
                    </script>
            </div>
        </div>
        <script>
            function copyJS() {
                var copyText = document.getElementById("lobby_id_cp");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
            }
        </script>

</main>

<?php showView("footer"); ?>