<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: logout.class.php
// Description: Defines the Logout function

//creating logout function
class Logout extends View {
// displaying a header by calling from the View class
    public function display() {
        parent::header();
        ?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p>You have successfully logged out.</p>
        </div>
        <!--        adding hyperlinks to other pages-->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>

        <?php
        parent::footer();
    }

}
