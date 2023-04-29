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
    if($result == 0) {
        $error = "Invalid input!";
    } else if ($result == 1) {
        $error = "☹️ There is no user with that email";
    } else if ($result == 2) {
        $error = "☹️ Wrong password";
    } else {
        $error = "Server Error!";
    }
}

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';

?>