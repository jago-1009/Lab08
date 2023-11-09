<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: index.class.php
// Description:

class Index extends View {
    
    public function display(){

        parent::header();
        ?>
                
            <form method="post" action="index.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="password" placeholder="Password, 5 characters minimum" required minlength="5">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>
                <input type="submit">
            </form>

            
        <?php
        parent::footer();

    }

}
?>