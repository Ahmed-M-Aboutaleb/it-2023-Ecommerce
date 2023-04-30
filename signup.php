<?php

/*

Variables:
    $pageTitle (string) - title of the page
    $cssFile (string) - name of the css file
    $error (string) - error message

*/

$pageTitle = "Shop - Signup";
$cssFile = "login.css";
$error = "";
define("INVALID_INPUT", 0);
define("EMAIL_EXISTS", 1);

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/auth/index.php - signup function
    /includes/views/signup.php - signup form
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/auth/index.php';

/*

Code:
    if user is logged in redirect to profile.php
    if signup form is submitted call signup function from /includes/services/auth/index.php
    if signup function returns 0 set error message to "Invalid input!"
    if signup function returns 1 set error message to "There is user with that email!"
    if signup function returns anything else set error message to "Server Error!"

*/

if(isset($_SESSION["id"])) {
    header("Location: profile.php");
}

if(isset($_POST["signup"])) {
    $result = signup($conn, $_POST["name"], $_POST["email"], $_POST["password"]);
    if($result == INVALID_INPUT) {
        $error = "Invalid input!";
    } else if($result == EMAIL_EXISTS){
        $error = "There is user with that email!";
    } else {
        $error = "Server Error!";
    }
}

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/signup.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';

?>