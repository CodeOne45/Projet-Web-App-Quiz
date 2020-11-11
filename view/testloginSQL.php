<?php
include_once 'header.php';
?>


<form class="" action="loginphp" method="post">
    <label for="">User name</label>
    <input type="text" name="email" placeholder="Email" value="">

    <label for="">Password</label>
    <input type="password" name="password" placeholder="Password" value="">

    <button type="submit" class="lbtn" name="log">Login</button>
</form>

<?php
include_once 'footer.php';
?>