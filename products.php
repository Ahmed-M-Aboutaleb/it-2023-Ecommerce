<?php 

$pageTitle = "Shop - Products page";
$cssFile = "products.css";
include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';

$categories = findCategories($conn);

if(isset($_GET["search"])) {
    $search = $_GET["search"];
    $products = search($conn, $search);
} else if(isset($_GET["category"])) {
    $category = $_GET["category"];
    $products = findProductsByCategory($conn, $category);
} else {
    $products = findProducts($conn);
}

?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/products.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php' ?>