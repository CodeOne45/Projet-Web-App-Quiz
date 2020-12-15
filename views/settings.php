<?php showView("header"); ?>

<h1>Settings</h1>

<!-- form for update user information -->
<form action="process_login" method="post">

    <div class="form-group">
        <label for="userName">Username</label>
        <input type="text" class="form-control" name="userName" value="<?php echo $_SESSION['userName']; ?>" required="">
    </div>

    <div class="form-group">
        <label for="userEmail">Email</label>
        <input type="email" class="form-control" name="userEmail" value="<?php echo $_SESSION['userMail']; ?>" required="">
    </div>

    <div class="form-group">
        <label for="newPwd">New Password</label>
        <input type="password" class="form-control" name="newPwd" placeholder="new password" required="">
    </div>

    <hr>

    <div class="form-actions">
        <!-- enable submit btn when user type their current password -->
        <input type="password" class="form-control ml-auto mr-3" name="currentPwd" placeholder="Enter Current Password" required="">

        <button type="submit" class="btn btn-primary" name="update">Update Account</button>
    </div>

</form>

<?php showView("footer"); ?>
