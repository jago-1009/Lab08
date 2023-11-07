<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: user_model.class.php
 * Description: User Model Class for connecting to SQL server
 */
class UserModel
{
//adds user into the user database
public function add_user($username,$password,$email,$firstname,$lastname) {

    $passwordSQL = password_hash($password);

}

//verifies user against the database
public function verify_user($username,$password) {

}
//Logs out by destroying the temporary cooking
public function logout() {

}
//password reset form
public function reset_password($username,$password) {

}

}