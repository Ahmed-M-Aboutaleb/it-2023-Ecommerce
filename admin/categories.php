<?php 
$pageTitle = "Categories Dashboard";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';

$categories = findCategories($conn);
?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/categories.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>