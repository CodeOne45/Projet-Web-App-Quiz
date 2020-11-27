<?php
include_once '../views/header.php';
//include data.inc.php --> to test
if (isset($message)) {
    echo '<label class="text-danger">.$message.</label>';
}
?>
<div class="container">
    <form action="../controllers/loginController.php" method="post">
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="pwd" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>

        <a href="register.php">Register now</a>
    </form>
</div>

<?php
if (isset($_GET["error"])) {
    if (isset($_GET["error"]) == "emptyInput") {
        ///echo "<p> Please, fill in all the information</p>";
        echo '<script language="javascript">';
        echo 'alert("Please, fill in all the information")';
        echo '</script>';
    }
}

?>

<?php
include_once '../views/footer.php';
?>