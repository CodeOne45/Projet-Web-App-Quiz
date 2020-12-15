<?php showView("header"); ?>

<section>
    <div class="container">
        <form action="process_register" method="post">
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
            <button type="submit" class="btn btn-primary" name="submit">Sign In</button>

            <a href="login">Already registered ? Click here</a>
        </form>
    </div>

    <?php
    if (isset($_GET["error"])) { //Show diffrent error messages
        switch ($_GET["error"]) {
            case "emptyInput":
                echo "<p> Please, fill in all the information</p>"; break;
            case "invalidEmail":
                echo "<p> Invalide format for the mail !</p>"; break;
            case "emailAlreadyUsed":
                echo "<p> Email already exists !</p>"; break;
            case "stmtFailed":
                echo "<p> Username already used </p>"; break; //TODO Moyen comme explication
            case "none": 
                echo "<p> Congrats, your account has been created :) </p>";
        }
    }
    ?>
</section>

<?php showView("footer"); ?>