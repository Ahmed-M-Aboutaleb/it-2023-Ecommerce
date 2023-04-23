<?php

$pageTitle = "Store - Profile";
$cssFile = "profile.css";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';
$error = "";
authorize();
if(isset($_POST["update"])) {
    $result = updateUser($conn, $_SESSION["id"], $_POST["name"], $_POST["email"], $_POST["password"], '', '');
    if(!$result) {
        $error = "Server error";
    }
    $error = "Profile updated successfully";
}
?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/profile.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>