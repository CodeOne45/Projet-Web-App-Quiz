<?php
include_once '../controllers/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Login MVC Model</title>
</head>

<body>
    <?php
    $usersObj = new UserController();
    $usersObj->loginUser("malikaman1999@gmail.com", "123456");
    $usersObj->registerUser("KUMAR2", "malikaman@gmail.com", "123456");
    ?>
</body>

</html>