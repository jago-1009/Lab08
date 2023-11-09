<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: verify_user.class.php
// Description:

class Verify extends View {
// displaying a header by calling from the View class
    public function display($result) {
        parent::header();

        $message = $result ? "You have successfully logged in." : "Your last attempt to login failed. Please try again.";
        ?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p><?= $message ?></p>
        </div>
        <div class="bottom-row">
        <span style="float: left">
                <?php
                if ($result) { //if the user has logged in, display the logout button
                    echo "Want to log out? <a href='index.php?action=logout'>Logout</a>";
                } else { //if the user has not logged in, display the login button
                    echo "Already have an account? <a href='index.php?action=login'>Login</a>";
                }
                ?>
            </span>
            <span style="float: right">Reset password? <a href="index.php?action=reset">Reset</a></span>
        </div>
        <?php
        parent::footer();
    }

}