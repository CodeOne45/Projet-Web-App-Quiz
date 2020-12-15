<?php
showView("header");
if (isset($message)) {
    echo '<label class="text-danger">.$message.</label>';
}
?>
<div class="container">
    <form action="process_login" method="post">
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="pwd" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>

        <a href="register">Register now</a>
    </form>
</div>

<?php
if (isset($_GET["error"])) { //Show diffrent error messages
    switch($_GET["error"]) {
        case "emptyInput": 
            echo '<script language="javascript">';
            echo 'alert("Please, fill in all the information")';
            echo '</script>';
            break;
        case "wrongLogin":
            echo "Your login is unknown from our database.";
            break;
        case "wrongPwd":
            echo "Wrong Password";
    }
}

?>
<?php showView("footer"); ?>