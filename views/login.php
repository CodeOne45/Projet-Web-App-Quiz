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

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>

            <a href="register.php">Register now</a>
        </form>

<?php
include_once 'footer.php';
?>