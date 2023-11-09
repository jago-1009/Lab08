<?php
/*
* Author: Deep Patel
* Date: 11/8/23
* File: user_controller.class.php
* Description: this is the user controller class
*/

class UserController{

    private $user_model;

    public function __construct(){
        //creating an instance of the UserModel class
        $this->user_model = new UserModel();
    }

    //index that stores all user information
    public function  index(){
        //retrieve from users
       $view = new Index();
       $view->display();
    }

    //create a user account by calling the addUser method of a userModel object
    public function register() {
        //call the addUser method of the UserModel object
        $result = $this->user_model->add_user();

        //display result
        $view = new Register();
        $view->display($result);
    }

    //display the login form
    public function login() {
        $view = new Login();
        $view->display();
    }

    //verify username and password by calling the verifyUser method
    public function verify() {
        $result = $this->user_model->verify_user();
        $view = new Verify();
        $view->display($result);
    }

    //log out a user by using logout method
    public function logout() {
        $this->user_model->logout();
        $view = new Logout();
        $view->display();
    }

    //display the password reset form or an error message.
    public function reset() {
        if (!isset($_COOKIE['user'])) {  //if the user has not logged in
            $this->error("To reset your password, please log in first.");
        } else { //if the user has logged in.
            $user = $_COOKIE['user'];
            $view = new Reset();
            $view->display($user);
        }
    }

    //reset password by calling the resetPassword method in user model
    public function do_reset() {

        $result = $this->user_model->reset_password();
        //exit($result);
        // view display and reset confirmation
        $view = new ResetConfirm();
        $view->display($result);
    }

    //display an error message
    public function error($message) {
        $view = new UserError();
        $view->display($message);
    }

}
