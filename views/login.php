<?php
include_once 'header.php';
//include data.inc.php --> to test
if (isset($message)) {
    echo '<label class="text-danger">.$message.</label>';
}
?>

<!--<form class="" action="..\includes\login.inc.php" method="post">
        <label for="">Username</label>
        <input type="text" name="email" placeholder="Email" value="">

        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password" value="">

        <button type="submit" class="btnLogin" name="submit">Login</button>

        <a href="register.php">S'inscrire !</a>
    </form>
    -->

<form action="..\includes\login.inc.php" method="post">
    <div class="form-group">
        <label for="name">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">
    </div>

<<<<<<< HEAD
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="pwd" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Login</button>

    <a href="register.php">Register now</a>
</form>
=======
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>

            <a href="register.php">Register now</a>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if (isset($_GET["error"]) == "emptyInput"){
                ///echo "<p> Please, fill in all the information</p>";
                echo '<script language="javascript">';
                echo 'alert("Please, fill in all the information")';
                echo '</script>';
            }
            
            
            
        }

        ?>
>>>>>>> aad02761984bce1848bc9cb5332f23fee490cab4

<?php
include_once 'footer.php';
?>