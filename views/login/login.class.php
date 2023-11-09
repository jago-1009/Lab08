<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: login.class.php
// Description:

class Login extends Index {

public function display(){

    parent::header();
    ?>

        <p>Please enter your username and password</p>

        <form method="post" action="index.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="password" placeholder="Password">
        </form>


    <?php
    parent::footer();

}

}