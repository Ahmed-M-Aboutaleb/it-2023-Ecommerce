<?php

$pageTitle = "Admin Dashboard";
$cssFile = "index.admin.css";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php';

$products = findThreeProducts($conn);
$users = findThreeUsers($conn);
$categories = findThreeCategories($conn);
$orders = findThreeOrders($conn);

?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/home.php'; ?>

<?php
include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';
?>