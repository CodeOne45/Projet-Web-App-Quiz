<?php
include_once 'C:\Users\malik\OneDrive\Bureau\Info DUT\Web Dev\Projet-Web-App-Quiz\view\header.php';
?>

<section>
    <h2>Sign-in</h2>
    <form action="testSignin.inc.php" method="post">
        <input type="text" name="nom" placeholder="Votre nom...">
        <input type="text" name="pnom" placeholder="Votre prénom...">
        <input type="text" name="uid" placeholder="Votre identifiant...">
        <input type="password" name="pwd" placeholder="Mot de passe...">

        <button type="submit" name="submit">Sign up</button>

        <a href="testloginSQL.php">Déja inscrite ?</a>
    </form>

</section>