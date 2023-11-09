<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: login.class.php
// Description: Defines the Login class

//creating login class
class Login extends View {
// displaying a header by calling from the View class
    public function display() {
        parent::header();
        ?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p>Please enter your username and password.</p>
            <!--        sends form to verify through post method-->
            <form method="post" action="index.php?action=verify">
                <div><input type="text" name="username" style="width: 99%" required placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>
        <!--        adding hyperlinks to other pages-->
        <div class="bottom-row">
            <span style="float: left">Don't have an account? <a href="index.php?action=index">Register</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        parent::footer();
    }

}
