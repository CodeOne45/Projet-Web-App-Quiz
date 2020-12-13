<?php showView("header"); ?>

<body>
    <?php
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, 'visitor') !== false) {
        $id_lobby_V = $_GET["id_lobby"];
        $_SESSION["lobby_Id"] = $id_lobby_V;

        showController("LobbyController");
        $lobby = new LobbyController();
        if ($lobby->get_lobby($id_lobby_V)) {
            echo "<h1>Joined Quiz room id : " . $_GET["id_lobby"] . "</h1>";

    ?>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="input-group">


                        <span class="input-group-btn">
                            <form action="lobby" method="get">
                                <input type="text" class="form-control" name="nickname" placeholder="Your name">

                                <input type="hidden" name="id_lobby" value=<?= $id_lobby_V ?>>
                                <button class="btn btn-primary btn-sm mr " type="submit"> Play</button>
                            </form>
                        </span>

                    </div>
                </div>
            </div>
    <?php
        } else {
            echo 'The invitation linked is wrong or has been expired !';
        }
    } else {
        echo 'The invitation linked is wrong or has been expired !';
    }
    ?>




    <?php showView("footer"); ?>