<?php
include_once 'C:\Users\malik\OneDrive\Bureau\Info DUT\Web Dev\Projet-Web-App-Quiz\views\header.php';
?>

<section>
    <h2>Sign-in</h2>
    <form action="..\..\includes\testSignin.inc.php" method="post">
        <input type="text" name="nom" placeholder="Votre nom...">
        <input type="text" name="pnom" placeholder="Votre prénom...">
        <input type="text" name="email" placeholder="Votre identifiant...">
        <input type="password" name="pwd" placeholder="Mot de passe...">

        <button type="submit" name="submit">Sign up</button>

        <a href="testloginSQL.php">Déja inscrite ?</a>
    </form>

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p> Remplir toutes les informations</p>";
        } else if ($_GET["error"] == "unvalidemail") {
            echo "<p> Email exicte déja !!!</p>";
        } else if ($_GET["error"] == "stsmfailed") {
            echo "<p> Error mais jsp d'ou ça vient :(</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p> Vous avez un compte maintenant :) </p>";
        }
    }
    ?>
</section>