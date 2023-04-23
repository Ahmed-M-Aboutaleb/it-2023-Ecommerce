<?php

$pageTitle = "Shop - Login";
$cssFile = "login.css";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/auth/index.php';

if(isset($_SESSION["id"])) {
    header("Location: profile.php");
}

$error = "";

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

?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/login.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>