<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: user_model.class.php
 * Description: User Model Class for connecting to SQL server
 */
class UserModel {
    //Private Variables
    private $db;
    private $dbConnection;


    //Constructor
    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }

    //adds a user into the "users" table in the database
    public function add_user() {
        //retrieves password from the registration form
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        //hashes the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //retrieves other user input from the registration form
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        //SQL query
        $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES(NULL, '$username', '$hashed_password', '$email', '$firstname', '$lastname')";

        //sends the query
        if ($this->dbConnection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //verifies username and password
    public function verify_user() {

        //retrieves username and password
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        //sql statement to filter the users table data with a username
        $sql = "SELECT password FROM " . $this->db->getUserTable() . " WHERE username='$username'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        //verify password; if password is valid, set a temporary cookie
        if ($query and $query->num_rows > 0) {
            $result_row = $query->fetch_assoc();
            $hash = $result_row['password'];
            if (password_verify($password, $hash)) {
                setcookie("user", $username);
                return true;
            }
        }

        return false;
    }

    //logout user: destroy cookie data
    public function logout() {
        //destroy session data
        setcookie("user", '', -10);
        return true;
    }

    //reset password function
    public function reset_password() {
        //retrieves username and password from a form
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        //hashes the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //SQL query
        $sql = "UPDATE  " . $this->db->getUserTable() . " SET password='$hashed_password' WHERE username='$username'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        //return false if there is no response from the query
        if (!$query || $this->dbConnection->affected_rows == 0) {

            return false;
        }

        return true;
    }
}