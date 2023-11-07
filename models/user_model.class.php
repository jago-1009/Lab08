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
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $fName = filter_var($firstname, FILTER_SANITIZE_STRING);
        $lName = filter_var($lastname);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->tblUsers ($username,$password,$email,$fName,$lName)";
        $query = $this->dbConnection->query($sql);
        if ($query === true) {
            $this->verify_user($username, $password);
            return true;
        }
        return false;
    }

//verifies user against the database
    public function verify_user($username, $password)
    {
        $username = filter_var($username, FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM $this->tblUsers WHERE username = '$username'";
        $query = $this->dbConnection->query($sql);
        if ($query->num_rows > 0) {
            $user = $query->fetch_assoc();
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
        $newPass = password_hash($newPass,PASSWORD_DEFAULT);
        $sql = "SELECT * FROM $this->tblUsers WHERE username = '$username'";
        $query = $this->dbConnection->query($sql);
        if ($query->num_rows > 0) {
            $user = $query->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $sql = "UPDATE $this->tblUsers SET password = '$newPass' WHERE username='$username'";
                $query = $this->dbConnection->query($sql);
                return true;
            }

        }
        return false;


    }

}