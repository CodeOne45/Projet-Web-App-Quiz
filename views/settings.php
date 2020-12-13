<?php showView("header"); ?>

<h1>Settings</h1>

<!-- form -->
<form action="process_login" method="post">

    <div class="form-group">
        <label for="userName">Username</label>
        <input type="text" class="form-control" id="userName" value="<?php echo $_SESSION['userName']; ?>" required="">
    </div>

    <div class="form-group">
        <label for="userEmail">Email</label>
        <input type="email" class="form-control" id="userEmail" value="<?php echo $_SESSION['userMail']; ?>" required=""> 
    </div>

    <div class="form-group">
        <label for="newPwd">New Password</label>
        <input type="password" class="form-control" id="newPwd" value="secret" required=""> 



    <hr>

    <div class="form-actions">
        <!-- enable submit btn when user type their current password -->
        <input type="password" class="form-control ml-auto mr-3" id="currentPwd" placeholder="Enter Current Password" required="">

        if () {
            <button type="submit" class="btn btn-primary" disabled>Update Account</button>

        } else {
            <button type="submit" class="btn btn-primary">Update Account</button>
        }

    </div>
    
</form>

<?php showView("footer"); ?>
