<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: logout.class.php
// Description:

class Logout extends Index {

    public function display(){
    
        parent::header();
        ?>
    
            <p>You have successfully logged out</p>
    
        <?php
        parent::footer();
    
    }
    
    }

?>

?>