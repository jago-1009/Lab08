<?php
// Author: Nate Osborne
//// Date: 11/8/2023
//// File: register.class.php
//// Description: Defines the Register class

//creating message to display
$register = "Please register!";

//creating register class
class Register extends View {

    //this method displays the page header
    public function display($result) {
        parent::header();

        //changes message based on if the account was created or not
        $message = ($result) ? "Your account has been successfully created." :
            "Your last attempt for creating an account failed. Please try again.";
        ?>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
<!--            displays message-->
            <p><?= $message ?></p>
        </div>
        <!--        adding hyperlinks to other pages-->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right"></span>
        </div>

        <?php
        parent::footer();
    }

}