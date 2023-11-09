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

    private $dbConnection;
    private $tblUsers;

//adds user into the user database
    public function add_user($username, $password, $email, $firstname, $lastname)
    {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        //filters the username value
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        //filters the email value
        $fName = filter_var($firstname, FILTER_SANITIZE_STRING);
        //filters the First Name value
        $lName = filter_var($lastname);
        //filters the Last Name value
        $password = password_hash($password, PASSWORD_DEFAULT);
        //hashes the password value
        $sql = "INSERT INTO $this->tblUsers ($username,$password,$email,$fName,$lName)";
        //SQL query
        $query = $this->dbConnection->query($sql);
        //sends the query
        if ($query === true) {
            $this->verify_user($username, $password);
            //verifies the data using $username and $password
            return true;
        }
        return false;
    }

//verifies user against the database
    public function verify_user($username, $password)
    {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        //filters the username variable again. extra security
        $sql = "SELECT * FROM $this->tblUsers WHERE username = '$username'";
        //SQL query
        $query = $this->dbConnection->query($sql);
        //sends the query
        if ($query->num_rows > 0) {
            $user = $query->fetch_assoc();
            //returns query as associative array
            if (password_verify($password, $user['password'])) {

                setcookie('username', $username, time() + 3600, '/');
                return true;
            }

        }
        return false;


    }

//Logs out by destroying the temporary cookie
    public function logout()
    {
        setcookie('username', '', time() - 3600, '/');
    }

//password reset form
    public function reset_password($username, $password, $newPass)
    {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        //gets username and filters
        $newPass = password_hash($newPass,PASSWORD_DEFAULT);
        //gets the new password and hashes it
        $sql = "SELECT * FROM $this->tblUsers WHERE username = '$username'";
        //SQL query
        $query = $this->dbConnection->query($sql);
        //Sends query
        if ($query->num_rows > 0) {
            $user = $query->fetch_assoc();
            //returns as associative array
            if (password_verify($password, $user['password'])) {
                //checks if password equals the password set in the SQL query
                $sql = "UPDATE $this->tblUsers SET password = '$newPass' WHERE username='$username'";
                //SQL query
                $query = $this->dbConnection->query($sql);
                //sends query
                return true;
            }

        }
        return false;


    }

}