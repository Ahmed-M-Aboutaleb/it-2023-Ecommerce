<?php 
$pageTitle = "Users Dashboard";
$cssFile = "users.admin.css";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';

$users = findUsers($conn);
?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/users.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>