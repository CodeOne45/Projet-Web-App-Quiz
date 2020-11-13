<?php
include_once 'header.php';
?>

    <section>
        <h2>Sign-in</h2>
        <form action="..\includes\signIn.inc.php" method="post">
            <input type="text" name="name" placeholder="Last name...">
            <input type="text" name="firstName" placeholder="First name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="pwd" placeholder="Password...">

            <button type="submit" name="submit">Sign up</button>

            <a href="login.php">Déja inscrite ?</a>
        </form>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInput") {
                echo "<p> Please, fill in all the information</p>";
            } else if ($_GET["error"] == "invalidEmail") {
                echo "<p> Email already exists !</p>";
            } else if ($_GET["error"] == "stsmFailed") {
                echo "<p> Error ! mais jsp d'ou ça vient :(</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p> Felicitation, your account was created now :) </p>";
            }
        }
        ?>
    </section>

<?php
include_once 'footer.php';
?>