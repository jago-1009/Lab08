<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: reset.class.php
// Description:

class Reset extends View {
//this method displays the page header
    public function display($user) {
        View::header();
        ?>
        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p>Please enter a new password. Username is not changeable.</p>
            <form method="post" action="index.php?action=do_reset">
                <div><input type="text" name="username" style="width: 99%" required value="<?= $user ?>" readonly="readonly"></div>
                <div><input type="password" name="password" style="width: 99%;" required minlength="5" placeholder="Password, 5 characters minimum"></div>
                <div><input type="submit" class="button" value="Reset Password"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Cancel password reset? <a href="index.php?action=login">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>
        <?php
//this method displays the page footer
        View::footer();
    }
}