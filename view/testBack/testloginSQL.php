<?php
include_once 'C:\Users\malik\OneDrive\Bureau\Info DUT\Web Dev\Projet-Web-App-Quiz\views\header.php';
//include data.inc.php --> to test
if (isset($message)) {
    echo '<label class="text-dangerr">.$message.</label>';
}
?>

<form class="" action="..\..\includes\login.inc.php" method="post">
    <label for="">User name</label>
    <input type="text" name="email" placeholder="Email ou identifiant" value="">

    <label for="">Password</label>
    <input type="password" name="password" placeholder="Password" value="">

    <button type="submit" class="lbtn" name="submit">Login</button>

    <a href="testSignin.php">S'inscrire !</a>
</form>