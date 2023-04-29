<?php 

/*

Variables:
    $pageTitle (string) - Title of the page
    $cssFile (string) - Name of the css file
    $error (string) - Error message

*/

$pageTitle = "Feedback";
$cssFile = "login.css";
$error = "";

/*

Includes:
    /init.php - Database connection, site url, site name, site description
    /includes/services/feedback/index.php - createFeedback function
    /includes/views/feedback.php - Feedback form
    /includes/templates/footer.php - Footer, html end tag

*/

include_once $_SERVER['DOCUMENT_ROOT'] . "/init.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/services/feedback/index.php";

if (isset($_POST['Add'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    $date = date("Y-m-d");
    if (!insertFeedback($conn, $name, $email, $feedback, $date)) {
        $error = "Error Adding";
    } else {
        $error = "Added Successfully";
    }
}

include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/views/feedback.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/templates/footer.php";

?>