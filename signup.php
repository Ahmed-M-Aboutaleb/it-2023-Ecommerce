<?php

$pageTitle = "Shop - Signup";
$cssFile = "login.css";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/auth/index.php';

if(isset($_SESSION["id"])) {
    header("Location: profile.php");
}

$error = "";

if(isset($_POST["signup"])) {
    $result = signup($conn, $_POST["name"], $_POST["email"], $_POST["password"]);
    if($result == 0) {
        $error = "Invalid input!";
    } else if($result == 1){
        $error = "There is user with that email!";
    } else {
        $error = "Server Error!";
    }
}

?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/signup.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>