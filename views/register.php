<?php
include_once 'header.php';
?>

    <section>

        <!--<form action="..\includes\signIn.inc.php" method="post">
            <input type="text" name="name" placeholder="Last name...">
            <input type="text" name="firstName" placeholder="First name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="pwd" placeholder="Password...">

            <button type="submit" name="submit">Sign up</button>

            <a href="login.php">S'inscrire !</a>
        </form>
        -->

        <form action="..\includes\signIn.inc.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Sign un</button>

            <a href="login.php">Already registered ? Click here</a>
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
                echo "<p> Congrats, your account has been created :) </p>";
            }
        }
        ?>
    </section>
<pre>
    <?php var_dump($_POST);?>
</pre>
<?php
include_once 'footer.php';
?>