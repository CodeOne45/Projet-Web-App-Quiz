<?php
include_once 'header.php';
//include data.inc.php --> to test
if (isset($message)) {
    echo '<label class="text-danger">.$message.</label>';
}
?>

    <form class="" action="..\includes\login.inc.php" method="post">
        <label for="">User name</label>
        <input type="text" name="email" placeholder="Email" value="">

        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password" value="">

        <button type="submit" class="btnLogin" name="submit">Login</button>

        <a href="register.php">S'inscrire !</a>
    </form>

<?php
include_once 'footer.php';
?>