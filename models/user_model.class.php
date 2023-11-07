<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: user_model.class.php
 * Description: User Model Class for connecting to SQL server
 */
class UserModel
{
    //declare SQL Parameters
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUsers;
//adds user into the user database
public function add_user($username,$password,$email,$firstname,$lastname) {
    $username = FILTER_SANITIZE_STRING($username);
    $email = FILTER_SANITIZE_STRING($email);
    $fName = FILTER_SANITIZE_STRING($firstname);
    $lName = FILTER_SANITIZE_STRING($lastname);
    $password = password_hash($password);
    $sql = `INSERT INTO $this->tblUsers ($username,$password,$email,$fName,$lName)`;
    $query = $this->dbConnection->query($sql);


}

//verifies user against the database
public function verify_user($username,$password) {

    if ($password == password_verify($passwordSQL) && $username == $usernameSQL) {
    setcookie($username,$password);
    return true;
    }
    else  {
        return false;
    }

}
//Logs out by destroying the temporary cookie
public function logout() {

}
//password reset form
public function reset_password($username,$password) {

}

}