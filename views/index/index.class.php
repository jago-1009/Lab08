<?php
// Author: Nate Osborne
// Date: 11/8/2023
// File: index.class.php
// Description:

class Index extends View {
    
    public function display(){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Home</title>
                <link href="www/css/styles.css" rel="stylesheet" type="text/css"/>
            </head>
            <body>
                
            <form action="index.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="password" placeholder="Password" required minlength="5">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>
            </form>

            </body>
            </html>

        <?php
    }

}
?>