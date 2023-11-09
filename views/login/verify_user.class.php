<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: verify_user.class.php
// Description:

class Verify extends Index {

    public function display(){
    
        parent::header();
        ?>
    
            <p>You have successfully logged in</p>

            <p>Your last attempt to login failed. Please try again.</p>
    
        <?php
        parent::footer();
    
    }
    
    }

?>