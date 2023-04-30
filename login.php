<?php

/*

Variables:
    $pageTitle (string) - title of the page
    $cssFile (string) - name of the css file
    $error (string) - error message

*/

$pageTitle = "Shop - Login";
$cssFile = "login.css";
$error = "";
define("INVALID_INPUT", 0);
define("FAKE_USER", 1);
define("WRONG_PASSWORD", 2);

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/auth/index.php - login function
    /includes/views/login.php - login form
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/auth/index.php';

/*

Code:
    if user is logged in redirect to profile.php
    if login form is submitted call login function from /includes/services/auth/index.php
    if login function returns 0 set error message to "Invalid input!"
    if login function returns 1 set error message to "There is no user with that email!"
    if login function returns 2 set error message to "Wrong password!"
    if login function returns anything else set error message to "Server Error!"

*/

if(isset($_SESSION["id"])) {
    header("Location: profile.php");
}

if(isset($_POST["login"])) {
    $result = login($conn, $_POST["email"], $_POST["password"]);
    if($result == INVALID_INPUT) {
        $error = "Invalid input!";
    } else if ($result == FAKE_USER) {
        $error = "☹️ There is no user with that email";
    } else if ($result == WRONG_PASSWORD) {
        $error = "☹️ Wrong password";
    } else {
        $error = "Server Error!";
    }
}

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';

?>