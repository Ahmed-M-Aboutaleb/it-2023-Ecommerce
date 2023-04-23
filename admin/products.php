<?php 
$pageTitle = "Products Dashboard";
$cssFile = "products.admin.css";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';

$products = findProducts($conn);
?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/products.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>