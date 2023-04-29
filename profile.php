<?php

/*

Variables:
    $pageTitle (string) - title of the page
    $cssFile (string) - name of the css file
    $error (string) - error message

*/

$pageTitle = "Store - Profile";
$cssFile = "profile.css";
$error = "";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/user/index.php - updateUser function
    /includes/views/profile.php - profile form
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';

/*

Code:
    if user is not logged in redirect to login.php
    if profile form is submitted call updateUser function from /includes/services/user/index.php
    if updateUser function returns false set error message to "Server error"
    if updateUser function returns true set error message to "Profile updated successfully"

*/

authorize();
if(isset($_POST["update"])) {
    $result = updateUser($conn, $_SESSION["id"], $_POST["name"], $_POST["email"], $_POST["password"], '', '');
    if(!$result) {
        $error = "Server error";
    }
    $error = "Profile updated successfully";
}

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/profile.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';

?>