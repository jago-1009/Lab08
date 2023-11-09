<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: index.class.php
// Description: Defines the Index class

//creating index class
class Index extends View {
//this method displays the page header
    public function display() {
        //display page header
        parent::header();
        ?>
<!--        creating form to put onto page-->
        <div class = "top-row">CREATE AN ACCOUNT</div>
        <div class = "middle-row"><p>Please complete the entire form. All fields are required.</p></div>
<!--        sends form to register through post method-->
        <form action="index.php?action=register" method="post">
            <div><input type="text" name="username" style="width: 99%" required placeholder="Username"></div>
            <div><input type="password" name="password" style="width: 99%" required minlength="5" placeholder="Password, 5 characters minimum"></div>
            <div><input type="email" name="email" style="width: 99%" required="" placeholder="Email"></div>
            <div><input type = 'text' name="fname" style="width: 99%" required placeholder="First name"></div>
            <div><input type="text" name="lname" style="width: 99%" required placeholder="Last name"></div>
            <div><input type="submit" class="button" value="register"></div>
        </form>
<!--        adding hyperlinks to other pages-->
        <div class = "bottom-row">
            <span style = "float: left"> Already have an account? <a href="index.class.php?action=login">Login</a></span>
            <span style = "float: right"></span>
        </div>
        </div>

        <?php
        parent::footer();
    }
}