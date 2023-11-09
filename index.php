<?php

/*
 * Author: Deep Patel
 * Date: 11/7/23
 * Name: index.php
 * Description: The index for the users.
 */

//include code in vendor/autoload.php file
require_once ("vendor/autoload.php");

//create an object of UserController
$user_controller = new UserController();

//default action for users
$action = "all";

//retrieve the action from a querystring variable named "action"
if (!($action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING))) {
    $action = "index";  //default action
}

//take different action depending on the action value
switch ($action) {
    case "index":
        $user_controller->index();
        break;
    case "register":
        $user_controller->register();
        break;
    case "login":
        $user_controller->login();
        break;
    case "verify":
        $user_controller->verify();
        break;
    case "logout":
        $user_controller->logout();
        break;
    case "reset":
        $user_controller->reset();
        break;
    case "do_reset":
        $user_controller->do_reset();
        break;
    default:
        $user_controller->error("Invalid action was requested.");
}